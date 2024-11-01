import Shuffle from 'shufflejs';


var InitShuffle = function (element) {
	this.groups = Array.from(document.querySelectorAll('.filter-options button'));

	this.shuffle = new Shuffle(element, {
		easing: 'initial', // easeOutQuart
		sizer: null,
	});

	this.filters = {
		groups: [],
	};

	this._bindEventListeners();
};

/**
 * Bind event listeners for when the filters change.
 */
InitShuffle.prototype._bindEventListeners = function () {
	this._onGroupChange = this._handleGroupChange.bind(this);

	this.groups.forEach(function (button) {
		button.addEventListener('click', this._onGroupChange);
	}, this);
};

/**
 * Get the values of each `active` button.
 * @return {Array.<string>}
 */
InitShuffle.prototype._getCurrentGroupFilters = function () {
	return this.groups.filter(function (button) {
		return button.classList.contains('active');
	}).map(function (button) {
		return button.getAttribute('data-group');
	});
};

/**
 * A group button was clicked. Update filters and display.
 * @param {Event} evt Click event object.
 */
InitShuffle.prototype._handleGroupChange = function (evt) {
	var btn = evt.currentTarget,
		isActive = btn.classList.contains('active'),
		btnGroup = btn.getAttribute('data-group'),
		filterGroup;

	this._removeActiveClassFromChildren(btn.parentNode);

	if (isActive) {
		btn.classList.remove('active');
		filterGroup = Shuffle.ALL_ITEMS;
	} else {
		btn.classList.add('active');
		filterGroup = btnGroup;
	}

	this.shuffle.filter(filterGroup);
};

InitShuffle.prototype._removeActiveClassFromChildren = function (parent) {
	var children = parent.children;
	for (var i = children.length - 1; i >= 0; i--) {
		children[i].classList.remove('active');
	}
};

/**
 * If any of the arrays in the `filters` property have a length of more than zero,
 * that means there is an active filter.
 * @return {boolean}
 */
InitShuffle.prototype.hasActiveFilters = function () {
	return Object.keys(this.filters).some(function (key) {
		return this.filters[key].length > 0;
	}, this);
};

/**
 * Determine whether an element passes the current filters.
 * @param {Element} element Element to test.
 * @return {boolean} Whether it satisfies all current filters.
 */
InitShuffle.prototype.itemPassesFilters = function (element) {
	var groups = this.filters.groups, group = element.getAttribute('data-group');

	// If there are active group filters and this group is not in that array.
	if (groups.length > 0 && !groups.includes(group)) {
		return false;
	}

	return true;
};

document.addEventListener('DOMContentLoaded', function () {
	window.demo = new InitShuffle(document.getElementById('portfolio-list'));
});