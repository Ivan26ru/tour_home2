	$(function() {

				var Page = (function() {

					var $grid = $( '#bb-custom-grid' );

					return {

						init : function() {

							$grid.find( 'div.bb-bookblock' ).each( function( i ) {

								var $bookBlock = $( this ),
									$nav = $bookBlock.next().children( 'span' ),
									bb = $bookBlock.bookblock( {
										perspective : 900,
										speed : 600,
										shadows : false
									} );

								// add navigation events
								$nav.each( function( i ) {

									$( this ).on( 'click', function( event ) {

										var $dot = $( this );
										if( !bb.isActive() ) {
											$nav.removeClass( 'bb-current' );
											$dot.addClass( 'bb-current' );
										}
										bb.jump( i + 1 );
										return false;

									} );

								} );

								// add swipe events
								$bookBlock.children().on( {

									'swipeleft'		: function( event ) {

										bb.next();
										return false;

									},
									'swiperight'	: function( event ) {

										bb.prev();
										return false;

									}

								} );

							} );

						}

					};

				})();

				Page.init();

			});