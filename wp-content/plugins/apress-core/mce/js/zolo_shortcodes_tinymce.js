(function() {
	tinymce.PluginManager.add( 'zolo_shortcodes_mce_button', function( editor, url ) {
		editor.addButton( 'zolo_shortcodes_mce_button', {
			title: 'ZOLO Shortcodes',
			type: 'menubutton',
			icon: 'icon zolo-shortcodes-icon',
			menu: [

				/** Elements **/
				{
					
							//Drop Cap
							text: 'Drop Cap',
							onclick: function() {
								editor.windowManager.open( {
									title: 'ZOLO Shortcodes - Drop Cap',
									body: [
									{
										type: 'textbox',
										name: 'dropCap',
										label: 'Dropcap Letter',
										value: 'A'
									},
									// Drop Cap font Size
									{
										type: 'textbox',
										name: 'dropcapFontsize',
										label: 'Dropcap Font Size',
										value: '24'
									},
									
									// Drop Cap Style
									{
										type: 'listbox',
										name: 'dropCapStyle',
										label: 'Drop Cap Style',
										'values': [
											{text: 'None', value: 'none'},
											{text: 'Square', value: 'square'},
											{text: 'Round', value: 'round'}
										]
									},
									// Drop Cap Color
									{
										type: 'textbox',
										name: 'dropCapColor',
										label: 'Font Color',
										value: '#333333'
									},
								
									{
										type: 'textbox',
										name: 'dropCapBackground',
										label: 'Background Color',
										value: '#dddddd'
									},
									],
									onsubmit: function( e ) {
										editor.insertContent( '[apress_dropcaps dropcap="' + e.data.dropCap + '" dropcap_fontsize="' + e.data.dropcapFontsize + '" dropcapstyle="' + e.data.dropCapStyle + '" dropcapcolor="' + e.data.dropCapColor + '" dropcapbackground="' + e.data.dropCapBackground + '"]');
									}
								});
							},
							
				},
				/** Underline Elements **/
				{
							
							
							//Underline
							text: 'Underline',
							onclick: function() {
								editor.windowManager.open( {
									title: 'ZOLO Shortcodes - Underline',
									body: [
									{
										type: 'textbox',
										name: 'underLine',
										label: 'Underline Letter',
										value: 'A'
									},
									// Underline First Color
									{
										type: 'textbox',
										name: 'underlinetextColor',
										label: 'Text Color',
										value: '#333333'
									},
									// Underline second Color
									{
										type: 'textbox',
										name: 'underlinetexthoverColor',
										label: 'Text Hover Color',
										value: '#333333'
									},
									// Underline Style
									{
										type: 'listbox',
										name: 'underlineStyle',
										label: 'Underline Style',
										'values': [
											{text: 'Underline', value: 'style1'},
											{text: 'Animated Underline', value: 'style2'},
											{text: 'Highlight Background', value: 'style3'}
										]
									},
									// Underline First Color
									{
										type: 'textbox',
										name: 'underlineFirstColor',
										label: 'Underline First Color',
										value: '#fed841'
									},
									// Underline second Color
									{
										type: 'textbox',
										name: 'underlineSecondColor',
										label: 'Underline Second Color',
										value: '#fed841'
									},
									
									// Underline Link
									{
										type: 'textbox',
										name: 'underlineLink',
										label: 'Link URL',
										value: ''
									},
									// Underline Style
									{
										type: 'listbox',
										name: 'underlineLinkTarget',
										label: 'Target',
										'values': [
											{text: 'Self', value: '_self'},
											{text: 'Blank', value: '_blank'},
										]
									},
									
									// Animation
									{
										type: 'listbox',
										name: 'Underline_Animation',
										label: 'Underline Animation',
										'values': [
											{text: 'Default', value: 'default'},
											{text: 'Animated', value: 'animation_true'}
										]
									},
									
									
									],
									onsubmit: function( e ) {
										editor.insertContent( '[apress_underline underline="' + e.data.underLine + '" underlinestyle="' + e.data.underlineStyle + '" underlinefirstcolor="' + e.data.underlineFirstColor + '" underlinesecondcolor="' + e.data.underlineSecondColor + '" underlinelink="' + e.data.underlineLink + '" underlinelinktarget="' + e.data.underlineLinkTarget + '" underlinetextcolor="' + e.data.underlinetextColor + '" underlinetexthovercolor="' + e.data.underlinetexthoverColor + '" underline_animation="' + e.data.Underline_Animation + '"]');
									}
								});
							},
							
							
							
							
						
							
					}, // End Elements Section

			]
		});
	});
})();