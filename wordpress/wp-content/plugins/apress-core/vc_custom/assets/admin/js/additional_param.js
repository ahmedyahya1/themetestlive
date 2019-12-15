/**
 * Backend JS for crum_font_container_param - parameter
 */

(function ($) {
	/*font container*/
	vc.atts.zolo_font_container = {
		parse: function (param) {
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var options = {},
				string_pieces,
				string;
			options.tag = $block.find('.vc_font_container_form_field-tag-select input[type="radio"]:checked').val();
			options.font_size = $block.find('.vc_font_container_form_field-font_size-input').val();
			options.text_align = $block.find('.vc_font_container_form_field-text_align-select > option:selected').val();
			options.font_family = $block.find('.vc_font_container_form_field-font_family-select input[type="radio"]:checked').val();
			options.color = $block.find('.field-color-result').val();
			options.line_height = $block.find('.vc_font_container_form_field-line_height-input').val();
			options.letter_spacing = $block.find('.vc_font_container_form_field-letter_spacing-input').val();
			options.font_style_italic = $block.find('.vc_font_container_form_field-font_style-checkbox.italic').prop('checked') ? "1" : "";
			options.font_style_bold = $block.find('.vc_font_container_form_field-font_style-checkbox.bold').prop('checked') ? "1" : "";
			options.font_style_underline = $block.find('.vc_font_container_form_field-font_style-checkbox.underline').prop('checked') ? "1" : "";
			string_pieces = _.map(options, function (value, key) {
				if (_.isString(value) && 0 < value.length) {
					return key + ':' + encodeURIComponent(value);
				}
			});
			string = $.grep(string_pieces, function (value) {
				return _.isString(value) && 0 < value.length;
			}).join('|');
			return string;
		},
		init: function (param, $field) {
			$field.find(".vc_font_container_form_field-color-input").wpColorPicker({
				palettes: true,
				change: function (event, ui) {
					var hexcolor = $(this).wpColorPicker('color');
					$field.find(".field-color-result").val(hexcolor);
				},
				clear: function () {
					$field.find(".field-color-result").val('');
				}
			});
//            $field.find(".vc_font_container_form_field-font_family-select").chosen({
//                disable_search_threshold: 10,
//                inherit_select_classes: true,
//                no_results_text: "Oops, nothing found!",
//                width: "100%"
//            });
			var $fontContainer = $field.find(".vc_font_container_form_field-font_family-select"),
				$google_fonts_param = $fontContainer.parents('[data-param_type="zolo_font_container"]').next('[data-vc-shortcode-param-name*="_google_fonts"]'),
				showHideElements = function () {
					var select = $('input[type="radio"]:checked', $fontContainer).val(),
						$google_fonts_param_checkbox_checked = $google_fonts_param.find('.zolo_single_checkbox_wrap input[type="checkbox"]:checked');

					if ($google_fonts_param.length > 0) {
						if (select != '') {
							if ($google_fonts_param_checkbox_checked.length > 0) {
								$google_fonts_param_checkbox_checked
									.click()
									.next('.zolo_single_checkbox')
									.find('.button-animation')
									.toggleClass('right-active');
							}

							$google_fonts_param
								.hide();
						} else {
							$google_fonts_param
								.show();
						}
					}
				};

			showHideElements();

			$fontContainer.find('input[type="radio"]').on('change', function () {
				$(this).parents('li').addClass('active').siblings().removeClass('active');
				showHideElements();
			});

			$field.find('.vc_font_container_form_field-tag-select input[type="radio"]').on('change', function () {
				$(this).parents('li').addClass('active').siblings().removeClass('active');
			});
		}
	};
	/*radio image*/
	vc.atts.radio_image_select = {
		render: function (param, value) {
			return value;
		},
		init: function (param, $field) {
			$field.find('.wpb_vc_param_value').imagepicker();
		}
	};
	/*radio advanced*/
	vc.atts.zolo_radio_advanced = {
		init: function (param, $field) {
			$field.find('input[type="radio"]').on('click', function () {
				$(this).parents('li').addClass('active').siblings().removeClass('active');
				$field.find('input[type="hidden"]').val($(this).val()).trigger('change');
			});
		}
	};
	/*box-shadow*/
	vc.atts.zolo_box_shadow_param = {
		parse: function (param) {
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var options = {},
				string_pieces,
				string;
			options.box_shadow_enable = $block.find('.vc_container_form_field-box_shadow_enable input[type="radio"]:checked').val();
			options.shadow_horizontal = $block.find('.vc_container_form_field-shadow_horizontal').val();
			options.shadow_vertical = $block.find('.vc_container_form_field-shadow_vertical').val();
			options.shadow_blur = $block.find('.vc_container_form_field-shadow_blur').val();
			options.shadow_spread = $block.find('.vc_container_form_field-shadow_spread').val();
			options.box_shadow_color = $block.find('.field-color-result').val();
			string_pieces = _.map(options, function (value, key) {
				if (_.isString(value) && 0 < value.length) {
					return key + ':' + encodeURIComponent(value);
				}
			});
			string = $.grep(string_pieces, function (value) {
				return _.isString(value) && 0 < value.length;
			}).join('|');
			return string;
		},
		init: function (param, $field) {
			$field.find(".vc_container_form_field-color-input").wpColorPicker({
				palettes: true,
				change: function (event, ui) {
					var hexcolor = $(this).wpColorPicker('color');
					$field.find(".field-color-result").val(hexcolor);
				},
				clear: function () {
					$field.find(".field-color-result").val('');
				}
			});
			var currValue = $field.find('.vc_container_form_field-box_shadow_enable input[type="radio"]:checked').val(),
				expandSection = function (val) {
					if (val != 'disable') {
						$field.find('.zolo-box-shadow-enable').addClass('expanded').siblings().show();
					} else {
						$field.find('.zolo-box-shadow-enable').removeClass('expanded').siblings().hide();
					}
				};

			expandSection(currValue);
			$field.find('.vc_container_form_field-box_shadow_enable input[type="radio"]').on('click', function () {
				$(this).attr('checked', 'checked').parents('li').addClass('active').siblings().removeClass('active').find('input[type="radio"]').removeAttr('checked');
				expandSection($(this).val());
			});
		},
	};
	/*margin*/
	vc.atts.zolo_margins = {		
		$this: this,
		parse: function (param) {

			var options = {},
				string_pieces,
				string;
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var getAllValues = function () {
				options.margin_top = $block.find('.vc_margin_container_form_field-margin-top').val();
				options.margin_bottom = $block.find('.vc_margin_container_form_field-margin-bottom').val();
				options.margin_left = $block.find('.vc_margin_container_form_field-margin-left').val();
				options.margin_right = $block.find('.vc_margin_container_form_field-margin-right').val();
			};
			var setValues = function () {
				string_pieces = _.map(options, function (value, key) {
					if (_.isString(value) && 0 < value.length) {
						key = key.replace(/_/g, "-");
						return key + ':' + encodeURIComponent(value);
					}
				});
				string = $.grep(string_pieces, function (value) {
					return _.isString(value) && 0 < value.length;
				}).join('|');

				return string;
			};

			getAllValues();
			return setValues();

		},
	};
	/*padding*/
	vc.atts.zolo_padding = {		
		$this: this,
		parse: function (param) {

			var options = {},
				string_pieces,
				string;
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var getAllValues = function () {
				options.padding_top = $block.find('.vc_padding_container_form_field-padding-top').val();
				options.padding_bottom = $block.find('.vc_padding_container_form_field-padding-bottom').val();
				options.padding_left = $block.find('.vc_padding_container_form_field-padding-left').val();
				options.padding_right = $block.find('.vc_padding_container_form_field-padding-right').val();
			};
			var setValues = function () {
				string_pieces = _.map(options, function (value, key) {
					if (_.isString(value) && 0 < value.length) {
						key = key.replace(/_/g, "-");
						return key + ':' + encodeURIComponent(value);
					}
				});
				string = $.grep(string_pieces, function (value) {
					return _.isString(value) && 0 < value.length;
				}).join('|');

				return string;
			};

			getAllValues();
			return setValues();

		},
	};
	/*responsive*/
	vc.atts.zolo_param_responsive_text = {
		parse: function (param) {
			var $field = this.content().find('.wpb_vc_param_value[name=' + param.param_name + ']');
			var $block = $field.parent();
			var options = {},
				string_pieces,
				string;

			options.font_size_desktop = $block.find('.vc_container_form_field-font_size_desktop').val();
			options.line_height_desktop = $block.find('.vc_container_form_field-line_height_desktop').val();
			options.letter_spacing_desktop = $block.find('.vc_container_form_field-letter_spacing_desktop').val();

			options.font_size_tablet = $block.find('.vc_container_form_field-font_size_tablet').val();
			options.line_height_tablet = $block.find('.vc_container_form_field-line_height_tablet').val();
			options.letter_spacing_tablet = $block.find('.vc_container_form_field-letter_spacing_tablet').val();

			options.font_size_mobile = $block.find('.vc_container_form_field-font_size_mobile').val();
			options.line_height_mobile = $block.find('.vc_container_form_field-line_height_mobile').val();
			options.letter_spacing_mobile = $block.find('.vc_container_form_field-letter_spacing_mobile').val();

			string_pieces = _.map(options, function (value, key) {
				if (_.isString(value) && 0 < value.length) {
					return key + ':' + encodeURIComponent(value);
				}
			});
			string = $.grep(string_pieces, function (value) {
				return _.isString(value) && 0 < value.length;
			}).join('|');
			return string;
		},
		init: function (param, $field) {
			$field.find('a.zolo-resolution-section-expand').click(function (e) {
				e.preventDefault();
				$(this).parents('.inner-wrap').toggleClass('expanded').find('input[type="number"]').each(function () {
					$(this).val('');
				});
			});
		}
	};
})(window.jQuery);