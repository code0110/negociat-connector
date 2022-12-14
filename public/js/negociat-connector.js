/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************************************************!*\
  !*** ./platform/plugins/negociat-connector/resources/assets/js/negociat-connector.js ***!
  \***************************************************************************************/
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var NegociatConnector = /*#__PURE__*/function () {
  function NegociatConnector() {
    _classCallCheck(this, NegociatConnector);

    this.categoryList = $('#category-select');
    this.categoryCheckbox = $('#copy_categories');
    this.listen();
  }

  _createClass(NegociatConnector, [{
    key: "listen",
    value: function listen() {
      var _this = this;

      $(document).on('click', '.import-wordpress-data', this["import"].bind(this));
      this.categoryCheckbox.on('change', function (e) {
        _this.toggleCategory(e.target.checked);
      });
    }
  }, {
    key: "toggleCategory",
    value: function toggleCategory() {
      var show = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

      if (show) {
        this.categoryList.slideUp();
      } else {
        this.categoryList.slideDown();
        setTimeout(this.loadCategory.bind(this), 500);
      }
    }
  }, {
    key: "loadCategory",
    value: function loadCategory() {
      var _this2 = this;

      if (this.categoryList.hasClass('loaded')) {
        return;
      }

      this.categoryList.addClass('loaded');
      this.call({
        url: '/api/v1/categories'
      }).then(function (res) {
        var $ul = _this2.categoryList.find('ul');

        $ul.empty();

        if (!res.error && res.data.length) {
          res.data.forEach(function (item, index) {
            $ul.append("<li class=\"".concat(item.slug, "\">\n                        <label for=\"").concat(item.slug, "\" class=\"control-label\">\n                            <input ").concat(index === 0 ? 'checked' : '', " type=\"radio\" value=\"").concat(item.id, "\" name=\"default_category_id\" id=\"").concat(item.slug, "\">\n                            <span>").concat(item.name, "</span>\n                        </label>\n                    </li>"));
          });
        }
      });
    }
  }, {
    key: "import",
    value: function _import(event) {
      event.preventDefault();

      var _self = $(event.currentTarget);

      $('.negociat-connector .alert').addClass('hidden');

      _self.addClass('button-loading');

      this.call({
        type: 'POST',
        url: _self.closest('form').prop('action'),
        data: new FormData(_self.closest('form')[0])
      }).then(function (res) {
        if (!res.error) {
          Botble.showSuccess(res.message);
          $('.negociat-connector .success-message').removeClass('hidden').text(res.message);
        } else {
          Botble.showError(res.message);
          $('.negociat-connector .error-message').removeClass('hidden').text(res.message);
        }

        _self.removeClass('button-loading');
      }, function (error) {
        Botble.handleError(error);

        _self.removeClass('button-loading');
      });
    }
  }, {
    key: "call",
    value: function call(obj) {
      return new Promise(function (resolve, reject) {
        $.ajax(_objectSpread(_objectSpread({
          type: 'GET',
          contentType: false,
          processData: false
        }, obj), {}, {
          success: function success(res) {
            resolve(res);
          },
          error: function error(res) {
            reject(res);
          }
        }));
      });
    }
  }]);

  return NegociatConnector;
}();

$(document).ready(function () {
  new NegociatConnector();
});
/******/ })()
;