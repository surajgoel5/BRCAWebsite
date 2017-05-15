function pict () {

	window.canUse=function(p){if(!window._canUse)window._canUse=document.createElement("div");var e=window._canUse.style,up=p.charAt(0).toUpperCase()+p.slice(1);return p in e||"Moz"+up in e||"Webkit"+up in e||"O"+up in e||"ms"+up in e};
		var	$body1 = document.querySelector('body');

			// setting.
				var setting = {

					// Images (in the format of 'url': 'alignment').
						images: {
							'images/home/3.jpg': 'center',
							'images/home/1.jpg': 'center',
							'images/home/4.jpg': 'center',
							'images/home/2.jpg': 'center'
							
						},

					// Delay.
						delay: 4000

				};

			// Vars.
				var	vas = 0, lastPos = 0,
					$wrapper, $bgs = [], $bg,
					k, v;

			// Create BG wrapper, BGs.
				$wrapper = document.createElement('div');
					$wrapper.id = 'bg';
					$body1.appendChild($wrapper);

				for (k in setting.images) {

					// Create BG.
						$bg = document.createElement('div');
							$bg.style.backgroundImage = 'url("' + k + '")';
							$bg.style.backgroundPosition = setting.images[k];
							$wrapper.appendChild($bg);

					// Add it to array.
						$bgs.push($bg);

				}

			// Main loop.
				$bgs[vas].classList.add('visible');
				$bgs[vas].classList.add('top');

				// Bail if we only have a single BG or the client doesn't support transitions.
					if ($bgs.length == 1
					||	!canUse('transition'))
						return;

				window.setInterval(function() {

					lastPos = vas;
					vas++;

					// Wrap to beginning if necessary.
						if (vas >= $bgs.length)
							vas = 0;

					// Swap top images.
						$bgs[lastPos].classList.remove('top');
						$bgs[vas].classList.add('visible');
						$bgs[vas].classList.add('top');

					// Hide last image after a short delay.
						window.setTimeout(function() {
							$bgs[lastPos].classList.remove('visible');
						}, setting.delay / 1.5);

				}, setting.delay);

} pict(); 