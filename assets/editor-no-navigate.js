// Editor only: a click on a link inside an ACF block preview must not navigate.
// In the iframed editor (WP 7.1) the click loads the link inside the editing frame; an
// off-site link makes that frame cross-origin and the editor crashes with
// "Failed to read a named property 'removeEventListener' from 'Window'".
// Same guard as ACF Custom Blocks 2.0.3 on codethedream.org (WO-79); running both is harmless.
( function () {
	document.addEventListener(
		'click',
		function ( event ) {
			var target = event.target;
			if ( ! target || ! target.closest ) {
				return;
			}
			var link = target.closest( 'a[href]' );
			if ( link && link.closest( '[data-type^="acf/"]' ) ) {
				event.preventDefault();
			}
		},
		true
	);
} )();
