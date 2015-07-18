(function (window, document) {
	var menu = document.getElementById('site-navigation');
	var button = document.getElementById('menu-toggle');
	var WINDOW_CHANGE_EVENT = ('onorientationchange' in window) ? 'orientationchange':'resize';
	if (menu == undefined) {
		return;
	}
	if (button == undefined) {
		return;
	}

	function toggleHorizontal() {
		searchAndToggle('.custom-can-transform', 'pure-menu-horizontal');
		searchAndToggle('.has-sub', 'pure-menu-has-children');
		searchAndToggle('.menu-children', 'pure-menu-children');
	};

	function searchAndToggle(searchQuery, toggleClass) {
		var customNodeList = document.querySelectorAll(searchQuery);
		var customMenus = [];
		for (var i=0; i < customNodeList.length; i++) {
			customMenus.push(customNodeList[i]);
		}
		for (var i=0; i < customMenus.length; i++) {
			customMenus[i].classList.toggle(toggleClass);
		}
	}

	function toggleMenu() {
		// set timeout so that the panel has a chance to roll up
		// before the menu switches states
		if (menu.classList.contains('open')) {
			setTimeout(toggleHorizontal, 500);
		}
		else {
			toggleHorizontal();
		}
		menu.classList.toggle('open');
		button.classList.toggle('x');
	};

	function closeMenu() {
		if (menu.classList.contains('open')) {
			toggleMenu();
		}
	}

	button.addEventListener('click', function (e) {
		toggleMenu();
	});

	window.addEventListener(WINDOW_CHANGE_EVENT, closeMenu);
})(this, this.document);
