(function () {
	'use strict';

	var THREE_URL = 'https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js';
	var desktopQuery = window.matchMedia('(min-width: 1024px)');

	function setProgress(globe, value) {
		var progress = Math.max(0, Math.min(100, Math.round(value)));
		var text = globe.querySelector('.is-globe-loading-text');
		var bar = globe.querySelector('.is-globe-progress span');

		if (text) {
			text.textContent = 'Loading ' + progress + '%';
		}

		if (bar) {
			bar.style.width = progress + '%';
		}
	}

	function showFallback(globe) {
		var fallback = globe.querySelector('.is-globe-fallback');
		var fallbackUrl = globe.getAttribute('data-fallback-url');

		setProgress(globe, 100);

		if (fallback && fallbackUrl) {
			fallback.style.backgroundImage = 'url("' + fallbackUrl + '")';
		}

		window.setTimeout(function () {
			globe.classList.add('is-globe-failed');
		}, 180);
	}

	function initDrag(canvas, globe) {
		var dragging = false;
		var previousX = 0;
		var previousY = 0;

		canvas.addEventListener('pointerdown', function (event) {
			dragging = true;
			previousX = event.clientX;
			previousY = event.clientY;
			canvas.setPointerCapture(event.pointerId);
		});

		canvas.addEventListener('pointermove', function (event) {
			if (!dragging || !globe) {
				return;
			}

			var deltaX = event.clientX - previousX;
			var deltaY = event.clientY - previousY;

			globe.rotation.y += deltaX * 0.008;
			globe.rotation.x = Math.max(-0.42, Math.min(0.42, globe.rotation.x + deltaY * 0.004));

			previousX = event.clientX;
			previousY = event.clientY;
		});

		canvas.addEventListener('pointerup', function (event) {
			dragging = false;
			canvas.releasePointerCapture(event.pointerId);
		});

		canvas.addEventListener('pointercancel', function () {
			dragging = false;
		});
	}

	async function initGlobe(globe) {
		var canvas = globe.querySelector('.is-globe-canvas');
		var textureUrl = globe.getAttribute('data-texture-url');

		if (!canvas || !textureUrl || !desktopQuery.matches) {
			return;
		}

		setProgress(globe, 4);

		try {
			var THREE = await import(THREE_URL);
			setProgress(globe, 34);

			var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera(34, 1, 0.1, 100);
			var renderer = new THREE.WebGLRenderer({
				canvas: canvas,
				antialias: true,
				alpha: true,
				powerPreference: 'high-performance'
			});

			camera.position.set(0, 0.02, 3.2);
			renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
			renderer.setSize(180, 180, false);
			renderer.outputColorSpace = THREE.SRGBColorSpace;
			renderer.toneMapping = THREE.ACESFilmicToneMapping;
			renderer.toneMappingExposure = 1.18;

			scene.add(new THREE.AmbientLight(0xffffff, 0.76));

			var keyLight = new THREE.DirectionalLight(0xffffff, 2.1);
			keyLight.position.set(3.2, 2.8, 4.2);
			scene.add(keyLight);

			var rimLight = new THREE.PointLight(0x33c4ff, 4.6, 8);
			rimLight.position.set(-2.2, 0.8, 2.4);
			scene.add(rimLight);

			var lowerGlow = new THREE.PointLight(0x006dff, 2.8, 7);
			lowerGlow.position.set(0, -1.8, 2);
			scene.add(lowerGlow);

			var loader = new THREE.TextureLoader();
			var texture = await new Promise(function (resolve, reject) {
				loader.load(
					textureUrl,
					resolve,
					function (event) {
						if (event && event.lengthComputable) {
							setProgress(globe, 34 + (event.loaded / event.total) * 54);
							return;
						}

						setProgress(globe, 72);
					},
					reject
				);
			});

			texture.colorSpace = THREE.SRGBColorSpace;
			texture.wrapS = THREE.RepeatWrapping;
			texture.wrapT = THREE.ClampToEdgeWrapping;
			texture.anisotropy = renderer.capabilities.getMaxAnisotropy();

			var sphereGeometry = new THREE.SphereGeometry(1.18, 120, 120);
			var sphereMaterial = new THREE.MeshStandardMaterial({
				map: texture,
				roughness: 0.38,
				metalness: 0.06,
				emissive: new THREE.Color(0x0d4d86),
				emissiveMap: texture,
				emissiveIntensity: 0.14
			});
			var earth = new THREE.Mesh(sphereGeometry, sphereMaterial);
			earth.rotation.y = -0.55;
			scene.add(earth);

			var atmosphere = new THREE.Mesh(
				new THREE.SphereGeometry(1.22, 100, 100),
				new THREE.MeshBasicMaterial({
					color: 0x58cdff,
					transparent: true,
					opacity: 0.1,
					blending: THREE.AdditiveBlending,
					depthWrite: false
				})
			);
			scene.add(atmosphere);

			var ring = new THREE.Mesh(
				new THREE.TorusGeometry(1.3, 0.0048, 10, 220),
				new THREE.MeshBasicMaterial({
					color: 0x65d9ff,
					transparent: true,
					opacity: 0.28
				})
			);
			ring.rotation.x = Math.PI / 2.78;
			ring.rotation.y = 0.5;
			scene.add(ring);

			var shouldAnimate = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
			initDrag(canvas, earth);
			setProgress(globe, 100);

			window.setTimeout(function () {
				globe.classList.add('is-globe-ready');
			}, 180);

			function animate() {
				if (shouldAnimate) {
					earth.rotation.y += 0.0016;
					atmosphere.rotation.y += 0.0012;
					ring.rotation.z += 0.001;
				}

				renderer.render(scene, camera);
				window.requestAnimationFrame(animate);
			}

			animate();
		} catch (error) {
			showFallback(globe);
		}
	}

	function boot() {
		if (!desktopQuery.matches) {
			return;
		}

		window.requestAnimationFrame(function () {
			document.querySelectorAll('.is-globe-thumbnail').forEach(initGlobe);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
}());
