this.BX = this.BX || {};
this.BX.Galamoon = this.BX.Galamoon || {};
(function (exports,main_core) {
	'use strict';

	var Assets = /*#__PURE__*/function () {
	  function Assets() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
	      name: 'Assets'
	    };
	    babelHelpers.classCallCheck(this, Assets);
	    this.name = options.name;
	  }

	  babelHelpers.createClass(Assets, [{
	    key: "setName",
	    value: function setName(name) {
	      if (main_core.Type.isString(name)) {
	        this.name = name;
	      }
	    }
	  }, {
	    key: "getName",
	    value: function getName() {
	      return this.name;
	    }
	  }]);
	  return Assets;
	}();

	exports.Assets = Assets;

}((this.BX.Galamoon.Assets = this.BX.Galamoon.Assets || {}),BX));
//# sourceMappingURL=assets.bundle.js.map
