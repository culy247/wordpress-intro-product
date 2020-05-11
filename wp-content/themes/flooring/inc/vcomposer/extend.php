<?php

/*____________________________________________  Animations ______________________________________*/
global $vc_add_css_animation;

if (function_exists('flooring_get_categories')){
	$cat_array = flooring_get_categories( 'projet' );
}else{
	$cat_array = array();
}

$vc_add_css_animation = array(
  'type' => 'dropdown',
  'heading' => esc_html__('CSS Animation', 'flooring'),
  'param_name' => 'css_animation',
  'admin_label' => true,
  'value' => array(
    esc_html__('No', 'flooring') => '',
    esc_html__('Bounce In', 'flooring') => 'bounceIn',
    esc_html__('Bounce In Down', 'flooring') => 'bounceInDown',
    esc_html__('Bounce In Left', 'flooring') => 'bounceInLeft',
    esc_html__('Bounce In Right', 'flooring') => 'bounceInRight',
    esc_html__('Bounce In Up', 'flooring') => 'bounceInUp',
    esc_html__('Fade In', 'flooring') => 'fadeIn',
    esc_html__('Fade In Down', 'flooring') => 'fadeInDown',
    esc_html__('Fade In Down Big', 'flooring') => 'fadeInDownBig',
    esc_html__('Fade In Left', 'flooring') => 'fadeInLeft',
    esc_html__('Fade In Left Big', 'flooring') => 'fadeInLeftBig',
    esc_html__('Fade In Right', 'flooring') => 'fadeInRight',
    esc_html__('Fade In Right Big', 'flooring') => 'fadeInRightBig',
    esc_html__('Fade In Up', 'flooring') => 'fadeInUp',
    esc_html__('Fade In Up Big', 'flooring') => 'fadeInUpBig',
    esc_html__('Flip', 'flooring') => 'flip',
    esc_html__('Flip In X', 'flooring') => 'flipInX',
    esc_html__('Flip In Y', 'flooring') => 'flipInY',
    esc_html__('Flip Out X', 'flooring') => 'flipOutX',
    esc_html__('Flip Out Y', 'flooring') => 'flipOutY',
    esc_html__('Light Speed In', 'flooring') => 'lightSpeedIn',
    esc_html__('Light Speed Out', 'flooring') => 'lightSpeedOut',
    esc_html__('Rotate In', 'flooring') => 'rotateIn',
    esc_html__('Rotate In Down Left', 'flooring') => 'rotateInDownLeft',
    esc_html__('Rotate In Down Right', 'flooring') => 'rotateInDownRight',
    esc_html__('Rotate In Up Left', 'flooring') => 'rotateInUpLeft',
    esc_html__('Rotate In Up Right', 'flooring') => 'rotateInUpRight',
    esc_html__('Slide In Up', 'flooring') => 'slideInUp',
    esc_html__('Slide In Down', 'flooring') => 'slideInDown',
    esc_html__('Slide In Left', 'flooring') => 'slideInLeft',
    esc_html__('Slide In Right', 'flooring') => 'slideInRight',
    esc_html__('Zoom In ', 'flooring') => 'zoomIn',
    esc_html__('Zoom In Down', 'flooring') => 'zoomInDown',
    esc_html__('Zoom In Left', 'flooring') => 'zoomInLeft',
    esc_html__('Zoom In Right', 'flooring') => 'zoomInRight',
    esc_html__('Zoom In Up', 'flooring') => 'zoomInUp',
    esc_html__('Roll In', 'flooring') => 'rollIn',
  ),
  'description' => esc_html__('Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'flooring')
);


$icons = 'a:370:{i:0;s:14:"---- None ----";s:9:"fa-adjust";s:9:"fa-adjust";s:6:"fa-adn";s:6:"fa-adn";s:15:"fa-align-center";s:15:"fa-align-center";s:16:"fa-align-justify";s:16:"fa-align-justify";s:13:"fa-align-left";s:13:"fa-align-left";s:14:"fa-align-right";s:14:"fa-align-right";s:12:"fa-ambulance";s:12:"fa-ambulance";s:9:"fa-anchor";s:9:"fa-anchor";s:10:"fa-android";s:10:"fa-android";s:20:"fa-angle-double-down";s:20:"fa-angle-double-down";s:20:"fa-angle-double-left";s:20:"fa-angle-double-left";s:21:"fa-angle-double-right";s:21:"fa-angle-double-right";s:18:"fa-angle-double-up";s:18:"fa-angle-double-up";s:13:"fa-angle-down";s:13:"fa-angle-down";s:13:"fa-angle-left";s:13:"fa-angle-left";s:14:"fa-angle-right";s:14:"fa-angle-right";s:11:"fa-angle-up";s:11:"fa-angle-up";s:8:"fa-apple";s:8:"fa-apple";s:10:"fa-archive";s:10:"fa-archive";s:20:"fa-arrow-circle-down";s:20:"fa-arrow-circle-down";s:20:"fa-arrow-circle-left";s:20:"fa-arrow-circle-left";s:22:"fa-arrow-circle-o-down";s:22:"fa-arrow-circle-o-down";s:22:"fa-arrow-circle-o-left";s:22:"fa-arrow-circle-o-left";s:23:"fa-arrow-circle-o-right";s:23:"fa-arrow-circle-o-right";s:20:"fa-arrow-circle-o-up";s:20:"fa-arrow-circle-o-up";s:21:"fa-arrow-circle-right";s:21:"fa-arrow-circle-right";s:18:"fa-arrow-circle-up";s:18:"fa-arrow-circle-up";s:13:"fa-arrow-down";s:13:"fa-arrow-down";s:13:"fa-arrow-left";s:13:"fa-arrow-left";s:14:"fa-arrow-right";s:14:"fa-arrow-right";s:11:"fa-arrow-up";s:11:"fa-arrow-up";s:9:"fa-arrows";s:9:"fa-arrows";s:13:"fa-arrows-alt";s:13:"fa-arrows-alt";s:11:"fa-arrows-h";s:11:"fa-arrows-h";s:11:"fa-arrows-v";s:11:"fa-arrows-v";s:11:"fa-asterisk";s:11:"fa-asterisk";s:11:"fa-backward";s:11:"fa-backward";s:6:"fa-ban";s:6:"fa-ban";s:14:"fa-bar-chart-o";s:14:"fa-bar-chart-o";s:10:"fa-barcode";s:10:"fa-barcode";s:7:"fa-bars";s:7:"fa-bars";s:7:"fa-beer";s:7:"fa-beer";s:7:"fa-bell";s:7:"fa-bell";s:9:"fa-bell-o";s:9:"fa-bell-o";s:12:"fa-bitbucket";s:12:"fa-bitbucket";s:19:"fa-bitbucket-square";s:19:"fa-bitbucket-square";s:7:"fa-bold";s:7:"fa-bold";s:7:"fa-bolt";s:7:"fa-bolt";s:7:"fa-book";s:7:"fa-book";s:11:"fa-bookmark";s:11:"fa-bookmark";s:13:"fa-bookmark-o";s:13:"fa-bookmark-o";s:12:"fa-briefcase";s:12:"fa-briefcase";s:6:"fa-btc";s:6:"fa-btc";s:6:"fa-bug";s:6:"fa-bug";s:13:"fa-building-o";s:13:"fa-building-o";s:11:"fa-bullhorn";s:11:"fa-bullhorn";s:11:"fa-bullseye";s:11:"fa-bullseye";s:11:"fa-calendar";s:11:"fa-calendar";s:13:"fa-calendar-o";s:13:"fa-calendar-o";s:9:"fa-camera";s:9:"fa-camera";s:15:"fa-camera-retro";s:15:"fa-camera-retro";s:13:"fa-caret-down";s:13:"fa-caret-down";s:13:"fa-caret-left";s:13:"fa-caret-left";s:14:"fa-caret-right";s:14:"fa-caret-right";s:22:"fa-caret-square-o-down";s:22:"fa-caret-square-o-down";s:22:"fa-caret-square-o-left";s:22:"fa-caret-square-o-left";s:23:"fa-caret-square-o-right";s:23:"fa-caret-square-o-right";s:20:"fa-caret-square-o-up";s:20:"fa-caret-square-o-up";s:11:"fa-caret-up";s:11:"fa-caret-up";s:14:"fa-certificate";s:14:"fa-certificate";s:15:"fa-chain-broken";s:15:"fa-chain-broken";s:8:"fa-check";s:8:"fa-check";s:15:"fa-check-circle";s:15:"fa-check-circle";s:17:"fa-check-circle-o";s:17:"fa-check-circle-o";s:15:"fa-check-square";s:15:"fa-check-square";s:17:"fa-check-square-o";s:17:"fa-check-square-o";s:22:"fa-chevron-circle-down";s:22:"fa-chevron-circle-down";s:22:"fa-chevron-circle-left";s:22:"fa-chevron-circle-left";s:23:"fa-chevron-circle-right";s:23:"fa-chevron-circle-right";s:20:"fa-chevron-circle-up";s:20:"fa-chevron-circle-up";s:15:"fa-chevron-down";s:15:"fa-chevron-down";s:15:"fa-chevron-left";s:15:"fa-chevron-left";s:16:"fa-chevron-right";s:16:"fa-chevron-right";s:13:"fa-chevron-up";s:13:"fa-chevron-up";s:9:"fa-circle";s:9:"fa-circle";s:11:"fa-circle-o";s:11:"fa-circle-o";s:12:"fa-clipboard";s:12:"fa-clipboard";s:10:"fa-clock-o";s:10:"fa-clock-o";s:8:"fa-cloud";s:8:"fa-cloud";s:17:"fa-cloud-download";s:17:"fa-cloud-download";s:15:"fa-cloud-upload";s:15:"fa-cloud-upload";s:7:"fa-code";s:7:"fa-code";s:12:"fa-code-fork";s:12:"fa-code-fork";s:9:"fa-coffee";s:9:"fa-coffee";s:6:"fa-cog";s:6:"fa-cog";s:7:"fa-cogs";s:7:"fa-cogs";s:10:"fa-columns";s:10:"fa-columns";s:10:"fa-comment";s:10:"fa-comment";s:12:"fa-comment-o";s:12:"fa-comment-o";s:11:"fa-comments";s:11:"fa-comments";s:13:"fa-comments-o";s:13:"fa-comments-o";s:10:"fa-compass";s:10:"fa-compass";s:11:"fa-compress";s:11:"fa-compress";s:14:"fa-credit-card";s:14:"fa-credit-card";s:7:"fa-crop";s:7:"fa-crop";s:13:"fa-crosshairs";s:13:"fa-crosshairs";s:7:"fa-css3";s:7:"fa-css3";s:10:"fa-cutlery";s:10:"fa-cutlery";s:10:"fa-desktop";s:10:"fa-desktop";s:15:"fa-dot-circle-o";s:15:"fa-dot-circle-o";s:11:"fa-download";s:11:"fa-download";s:11:"fa-dribbble";s:11:"fa-dribbble";s:10:"fa-dropbox";s:10:"fa-dropbox";s:8:"fa-eject";s:8:"fa-eject";s:13:"fa-ellipsis-h";s:13:"fa-ellipsis-h";s:13:"fa-ellipsis-v";s:13:"fa-ellipsis-v";s:11:"fa-envelope";s:11:"fa-envelope";s:13:"fa-envelope-o";s:13:"fa-envelope-o";s:9:"fa-eraser";s:9:"fa-eraser";s:6:"fa-eur";s:6:"fa-eur";s:11:"fa-exchange";s:11:"fa-exchange";s:14:"fa-exclamation";s:14:"fa-exclamation";s:21:"fa-exclamation-circle";s:21:"fa-exclamation-circle";s:23:"fa-exclamation-triangle";s:23:"fa-exclamation-triangle";s:9:"fa-expand";s:9:"fa-expand";s:16:"fa-external-link";s:16:"fa-external-link";s:23:"fa-external-link-square";s:23:"fa-external-link-square";s:6:"fa-eye";s:6:"fa-eye";s:12:"fa-eye-slash";s:12:"fa-eye-slash";s:11:"fa-facebook";s:11:"fa-facebook";s:18:"fa-facebook-square";s:18:"fa-facebook-square";s:16:"fa-fast-backward";s:16:"fa-fast-backward";s:15:"fa-fast-forward";s:15:"fa-fast-forward";s:9:"fa-female";s:9:"fa-female";s:14:"fa-fighter-jet";s:14:"fa-fighter-jet";s:7:"fa-file";s:7:"fa-file";s:9:"fa-file-o";s:9:"fa-file-o";s:12:"fa-file-text";s:12:"fa-file-text";s:14:"fa-file-text-o";s:14:"fa-file-text-o";s:10:"fa-files-o";s:10:"fa-files-o";s:7:"fa-film";s:7:"fa-film";s:9:"fa-filter";s:9:"fa-filter";s:7:"fa-fire";s:7:"fa-fire";s:20:"fa-fire-extinguisher";s:20:"fa-fire-extinguisher";s:7:"fa-flag";s:7:"fa-flag";s:17:"fa-flag-checkered";s:17:"fa-flag-checkered";s:9:"fa-flag-o";s:9:"fa-flag-o";s:8:"fa-flask";s:8:"fa-flask";s:9:"fa-flickr";s:9:"fa-flickr";s:11:"fa-floppy-o";s:11:"fa-floppy-o";s:9:"fa-folder";s:9:"fa-folder";s:11:"fa-folder-o";s:11:"fa-folder-o";s:14:"fa-folder-open";s:14:"fa-folder-open";s:16:"fa-folder-open-o";s:16:"fa-folder-open-o";s:7:"fa-font";s:7:"fa-font";s:10:"fa-forward";s:10:"fa-forward";s:13:"fa-foursquare";s:13:"fa-foursquare";s:10:"fa-frown-o";s:10:"fa-frown-o";s:10:"fa-gamepad";s:10:"fa-gamepad";s:8:"fa-gavel";s:8:"fa-gavel";s:6:"fa-gbp";s:6:"fa-gbp";s:7:"fa-gift";s:7:"fa-gift";s:9:"fa-github";s:9:"fa-github";s:13:"fa-github-alt";s:13:"fa-github-alt";s:16:"fa-github-square";s:16:"fa-github-square";s:9:"fa-gittip";s:9:"fa-gittip";s:8:"fa-glass";s:8:"fa-glass";s:8:"fa-globe";s:8:"fa-globe";s:14:"fa-google-plus";s:14:"fa-google-plus";s:21:"fa-google-plus-square";s:21:"fa-google-plus-square";s:11:"fa-h-square";s:11:"fa-h-square";s:14:"fa-hand-o-down";s:14:"fa-hand-o-down";s:14:"fa-hand-o-left";s:14:"fa-hand-o-left";s:15:"fa-hand-o-right";s:15:"fa-hand-o-right";s:12:"fa-hand-o-up";s:12:"fa-hand-o-up";s:8:"fa-hdd-o";s:8:"fa-hdd-o";s:13:"fa-headphones";s:13:"fa-headphones";s:8:"fa-heart";s:8:"fa-heart";s:10:"fa-heart-o";s:10:"fa-heart-o";s:7:"fa-home";s:7:"fa-home";s:13:"fa-hospital-o";s:13:"fa-hospital-o";s:8:"fa-html5";s:8:"fa-html5";s:8:"fa-inbox";s:8:"fa-inbox";s:9:"fa-indent";s:9:"fa-indent";s:7:"fa-info";s:7:"fa-info";s:14:"fa-info-circle";s:14:"fa-info-circle";s:6:"fa-inr";s:6:"fa-inr";s:12:"fa-instagram";s:12:"fa-instagram";s:9:"fa-italic";s:9:"fa-italic";s:6:"fa-jpy";s:6:"fa-jpy";s:6:"fa-key";s:6:"fa-key";s:13:"fa-keyboard-o";s:13:"fa-keyboard-o";s:6:"fa-krw";s:6:"fa-krw";s:9:"fa-laptop";s:9:"fa-laptop";s:7:"fa-leaf";s:7:"fa-leaf";s:10:"fa-lemon-o";s:10:"fa-lemon-o";s:13:"fa-level-down";s:13:"fa-level-down";s:11:"fa-level-up";s:11:"fa-level-up";s:14:"fa-lightbulb-o";s:14:"fa-lightbulb-o";s:7:"fa-link";s:7:"fa-link";s:11:"fa-linkedin";s:11:"fa-linkedin";s:18:"fa-linkedin-square";s:18:"fa-linkedin-square";s:8:"fa-linux";s:8:"fa-linux";s:7:"fa-list";s:7:"fa-list";s:11:"fa-list-alt";s:11:"fa-list-alt";s:10:"fa-list-ol";s:10:"fa-list-ol";s:10:"fa-list-ul";s:10:"fa-list-ul";s:17:"fa-location-arrow";s:17:"fa-location-arrow";s:7:"fa-lock";s:7:"fa-lock";s:18:"fa-long-arrow-down";s:18:"fa-long-arrow-down";s:18:"fa-long-arrow-left";s:18:"fa-long-arrow-left";s:19:"fa-long-arrow-right";s:19:"fa-long-arrow-right";s:16:"fa-long-arrow-up";s:16:"fa-long-arrow-up";s:8:"fa-magic";s:8:"fa-magic";s:9:"fa-magnet";s:9:"fa-magnet";s:17:"fa-mail-reply-all";s:17:"fa-mail-reply-all";s:7:"fa-male";s:7:"fa-male";s:13:"fa-map-marker";s:13:"fa-map-marker";s:9:"fa-maxcdn";s:9:"fa-maxcdn";s:9:"fa-medkit";s:9:"fa-medkit";s:8:"fa-meh-o";s:8:"fa-meh-o";s:13:"fa-microphone";s:13:"fa-microphone";s:19:"fa-microphone-slash";s:19:"fa-microphone-slash";s:8:"fa-minus";s:8:"fa-minus";s:15:"fa-minus-circle";s:15:"fa-minus-circle";s:15:"fa-minus-square";s:15:"fa-minus-square";s:17:"fa-minus-square-o";s:17:"fa-minus-square-o";s:9:"fa-mobile";s:9:"fa-mobile";s:8:"fa-money";s:8:"fa-money";s:9:"fa-moon-o";s:9:"fa-moon-o";s:8:"fa-music";s:8:"fa-music";s:10:"fa-outdent";s:10:"fa-outdent";s:12:"fa-pagelines";s:12:"fa-pagelines";s:12:"fa-paperclip";s:12:"fa-paperclip";s:8:"fa-pause";s:8:"fa-pause";s:9:"fa-pencil";s:9:"fa-pencil";s:16:"fa-pencil-square";s:16:"fa-pencil-square";s:18:"fa-pencil-square-o";s:18:"fa-pencil-square-o";s:8:"fa-phone";s:8:"fa-phone";s:15:"fa-phone-square";s:15:"fa-phone-square";s:12:"fa-picture-o";s:12:"fa-picture-o";s:12:"fa-pinterest";s:12:"fa-pinterest";s:19:"fa-pinterest-square";s:19:"fa-pinterest-square";s:8:"fa-plane";s:8:"fa-plane";s:7:"fa-play";s:7:"fa-play";s:14:"fa-play-circle";s:14:"fa-play-circle";s:16:"fa-play-circle-o";s:16:"fa-play-circle-o";s:7:"fa-plus";s:7:"fa-plus";s:14:"fa-plus-circle";s:14:"fa-plus-circle";s:14:"fa-plus-square";s:14:"fa-plus-square";s:16:"fa-plus-square-o";s:16:"fa-plus-square-o";s:12:"fa-power-off";s:12:"fa-power-off";s:8:"fa-print";s:8:"fa-print";s:15:"fa-puzzle-piece";s:15:"fa-puzzle-piece";s:9:"fa-qrcode";s:9:"fa-qrcode";s:11:"fa-question";s:11:"fa-question";s:18:"fa-question-circle";s:18:"fa-question-circle";s:13:"fa-quote-left";s:13:"fa-quote-left";s:14:"fa-quote-right";s:14:"fa-quote-right";s:9:"fa-random";s:9:"fa-random";s:10:"fa-refresh";s:10:"fa-refresh";s:9:"fa-renren";s:9:"fa-renren";s:9:"fa-repeat";s:9:"fa-repeat";s:8:"fa-reply";s:8:"fa-reply";s:12:"fa-reply-all";s:12:"fa-reply-all";s:10:"fa-retweet";s:10:"fa-retweet";s:7:"fa-road";s:7:"fa-road";s:9:"fa-rocket";s:9:"fa-rocket";s:6:"fa-rss";s:6:"fa-rss";s:13:"fa-rss-square";s:13:"fa-rss-square";s:6:"fa-rub";s:6:"fa-rub";s:11:"fa-scissors";s:11:"fa-scissors";s:9:"fa-search";s:9:"fa-search";s:15:"fa-search-minus";s:15:"fa-search-minus";s:14:"fa-search-plus";s:14:"fa-search-plus";s:8:"fa-share";s:8:"fa-share";s:15:"fa-share-square";s:15:"fa-share-square";s:17:"fa-share-square-o";s:17:"fa-share-square-o";s:9:"fa-shield";s:9:"fa-shield";s:16:"fa-shopping-cart";s:16:"fa-shopping-cart";s:10:"fa-sign-in";s:10:"fa-sign-in";s:11:"fa-sign-out";s:11:"fa-sign-out";s:9:"fa-signal";s:9:"fa-signal";s:10:"fa-sitemap";s:10:"fa-sitemap";s:8:"fa-skype";s:8:"fa-skype";s:10:"fa-smile-o";s:10:"fa-smile-o";s:7:"fa-sort";s:7:"fa-sort";s:17:"fa-sort-alpha-asc";s:17:"fa-sort-alpha-asc";s:18:"fa-sort-alpha-desc";s:18:"fa-sort-alpha-desc";s:18:"fa-sort-amount-asc";s:18:"fa-sort-amount-asc";s:19:"fa-sort-amount-desc";s:19:"fa-sort-amount-desc";s:11:"fa-sort-asc";s:11:"fa-sort-asc";s:12:"fa-sort-desc";s:12:"fa-sort-desc";s:19:"fa-sort-numeric-asc";s:19:"fa-sort-numeric-asc";s:20:"fa-sort-numeric-desc";s:20:"fa-sort-numeric-desc";s:10:"fa-spinner";s:10:"fa-spinner";s:9:"fa-square";s:9:"fa-square";s:11:"fa-square-o";s:11:"fa-square-o";s:17:"fa-stack-exchange";s:17:"fa-stack-exchange";s:17:"fa-stack-overflow";s:17:"fa-stack-overflow";s:7:"fa-star";s:7:"fa-star";s:12:"fa-star-half";s:12:"fa-star-half";s:14:"fa-star-half-o";s:14:"fa-star-half-o";s:9:"fa-star-o";s:9:"fa-star-o";s:16:"fa-step-backward";s:16:"fa-step-backward";s:15:"fa-step-forward";s:15:"fa-step-forward";s:14:"fa-stethoscope";s:14:"fa-stethoscope";s:7:"fa-stop";s:7:"fa-stop";s:16:"fa-strikethrough";s:16:"fa-strikethrough";s:12:"fa-subscript";s:12:"fa-subscript";s:11:"fa-suitcase";s:11:"fa-suitcase";s:8:"fa-sun-o";s:8:"fa-sun-o";s:14:"fa-superscript";s:14:"fa-superscript";s:8:"fa-table";s:8:"fa-table";s:9:"fa-tablet";s:9:"fa-tablet";s:13:"fa-tachometer";s:13:"fa-tachometer";s:6:"fa-tag";s:6:"fa-tag";s:7:"fa-tags";s:7:"fa-tags";s:8:"fa-tasks";s:8:"fa-tasks";s:11:"fa-terminal";s:11:"fa-terminal";s:14:"fa-text-height";s:14:"fa-text-height";s:13:"fa-text-width";s:13:"fa-text-width";s:5:"fa-th";s:5:"fa-th";s:11:"fa-th-large";s:11:"fa-th-large";s:10:"fa-th-list";s:10:"fa-th-list";s:13:"fa-thumb-tack";s:13:"fa-thumb-tack";s:14:"fa-thumbs-down";s:14:"fa-thumbs-down";s:16:"fa-thumbs-o-down";s:16:"fa-thumbs-o-down";s:14:"fa-thumbs-o-up";s:14:"fa-thumbs-o-up";s:12:"fa-thumbs-up";s:12:"fa-thumbs-up";s:9:"fa-ticket";s:9:"fa-ticket";s:8:"fa-times";s:8:"fa-times";s:15:"fa-times-circle";s:15:"fa-times-circle";s:17:"fa-times-circle-o";s:17:"fa-times-circle-o";s:7:"fa-tint";s:7:"fa-tint";s:10:"fa-trash-o";s:10:"fa-trash-o";s:9:"fa-trello";s:9:"fa-trello";s:9:"fa-trophy";s:9:"fa-trophy";s:8:"fa-truck";s:8:"fa-truck";s:6:"fa-try";s:6:"fa-try";s:9:"fa-tumblr";s:9:"fa-tumblr";s:16:"fa-tumblr-square";s:16:"fa-tumblr-square";s:10:"fa-twitter";s:10:"fa-twitter";s:17:"fa-twitter-square";s:17:"fa-twitter-square";s:11:"fa-umbrella";s:11:"fa-umbrella";s:12:"fa-underline";s:12:"fa-underline";s:7:"fa-undo";s:7:"fa-undo";s:9:"fa-unlock";s:9:"fa-unlock";s:13:"fa-unlock-alt";s:13:"fa-unlock-alt";s:9:"fa-upload";s:9:"fa-upload";s:6:"fa-usd";s:6:"fa-usd";s:7:"fa-user";s:7:"fa-user";s:10:"fa-user-md";s:10:"fa-user-md";s:8:"fa-users";s:8:"fa-users";s:15:"fa-video-camera";s:15:"fa-video-camera";s:15:"fa-vimeo-square";s:15:"fa-vimeo-square";s:5:"fa-vk";s:5:"fa-vk";s:14:"fa-volume-down";s:14:"fa-volume-down";s:13:"fa-volume-off";s:13:"fa-volume-off";s:12:"fa-volume-up";s:12:"fa-volume-up";s:8:"fa-weibo";s:8:"fa-weibo";s:13:"fa-wheelchair";s:13:"fa-wheelchair";s:10:"fa-windows";s:10:"fa-windows";s:9:"fa-wrench";s:9:"fa-wrench";s:7:"fa-xing";s:7:"fa-xing";s:14:"fa-xing-square";s:14:"fa-xing-square";s:10:"fa-youtube";s:10:"fa-youtube";s:15:"fa-youtube-play";s:15:"fa-youtube-play";s:17:"fa-youtube-square";s:17:"fa-youtube-square";}';
$icons = unserialize($icons);

get_template_part('inc/vcomposer/wd_empty_spaces');
get_template_part('inc/vcomposer/vc_elements/vc-gallery');

/*============================= Row =====================================*/

vc_add_param("vc_row",
  array(
    'type' => 'colorpicker',
    'heading' => esc_html__('Text Color', 'flooring'),
    'param_name' => 'font_color',
    'description' => esc_html__('Select font color', 'flooring'),
  )
);
vc_add_param("vc_row", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Parallax",
  "param_name" => "parallax",
  "value" => array("Use background as parallax ?" => "yes")
));
vc_add_param("vc_row", array(
  "type" => "textfield",
  "class" => "",
  "heading" => "Parallax Speed",
  "param_name" => "speed",
  'dependency' => array(
    'element' => 'parallax',
    'not_empty' => true,
  ),
));
vc_add_param("vc_row", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Equal Height Columns",
  "param_name" => "equalizer",
  "value" => array("Create equal height content on your row ?" => "yes")
));

vc_add_param("vc_row", array(
  "type" => "textfield",
  "class" => "",
  "heading" => "Animation Delay (ms)",
  "param_name" => "animation_delay",
  "description" => "Animation delay to add to this row children.",
  /*'dependency' => array(
    'element' => 'parallax',
    'not_empty' => true,
  ),*/
));

/*============================= Columns  =====================================*/
vc_add_param("vc_column", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Equal Height Columns",
  "param_name" => "equalizer_column",
  "value" => array("Create equal height content on your column ?" => "yes")
));
vc_add_param("vc_column_inner", array(
  "type" => "checkbox",
  "class" => "",
  "heading" => "Equal Height Columns",
  "param_name" => "equalizer_column_inner",
  "value" => array("Create equal height content on your column ?" => "yes")
));



/* recent blog
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Recent From Blog", 'flooring'),
  "base" => "wd_blog",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Items to display", 'flooring'),
      "param_name" => "itemperpage",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in mobile", 'flooring'),
      "param_name" => "columns_mobile"
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in tablet", 'flooring'),
      "param_name" => "columns_tablet"
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in desktop", 'flooring'),
      "param_name" => "columns_desktop"
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display thumbnail", 'flooring'),
      "param_name" => "show_thumbnail",
      "std" => "yes",
      'value' => array(esc_html__('Yes, please', 'flooring') => 'yes'),
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display Pagination", 'flooring'),
      "param_name" => "show_pagination",
    ),
    $vc_add_css_animation


  )
));
/* portfolio
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Portfolio", 'flooring'),
  "base" => "wd_vc_portfolio",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in mobile", 'flooring'),
      "param_name" => "columns_mobile",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in tablet", 'flooring'),
      "param_name" => "columns_tablet",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in desktop", 'flooring'),
      "param_name" => "columns_desktop",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type"       => "checkbox",
      "heading"    => esc_html__( "Categories", 'flooring' ),
      "param_name" => "category",
      'value'      => $cat_array,
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Items to display", 'flooring'),
      "param_name" => "itemperpage",
      'description' => esc_html__('Used in Carousel Layout', 'flooring'),
    ),
    array(
      "type" => "dropdown", // it will bind a textfield in WP
      "heading" => esc_html__("Layout", 'flooring'),
      "param_name" => "layout",
      "value" => array('Style I' => '1', 'Style II' => '2', 'Style III' => '3'),
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display Pagination", 'flooring'),
      "param_name" => "show_pagination",
    ),
    $vc_add_css_animation

  )
));


/* Image with text
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Image Box", 'flooring'),
  "base" => "wd_image_with_text",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Title", 'flooring'),
      "param_name" => "title",
    ),
    array(
      "type" => "textarea",
      "heading" => esc_html__("Text", 'flooring'),
      "param_name" => "text",
    ),
    array(
      "type" => "attach_image", // it will bind a img choice in WP
      "heading" => esc_html__("Image", 'flooring'),
      "param_name" => "image",
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Layout', 'flooring'),
      'param_name' => 'layout',
      'value' => array('Layout 1 (title above image)' => 1, 'Layout 2 (title below image)' => 2),
      'description' => esc_html__('Select the box style.', 'flooring'),
      'admin_label' => true
    ),
    array(
      "type" => "vc_link",
      "heading" => esc_html__("URL to :", 'flooring'),
      "param_name" => "url",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Extra Classes", 'flooring'),
      "param_name" => "extra_classes",
    ),
    $vc_add_css_animation
  )
));
/* Text Block with icon/image
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Text Block With Icon", 'flooring'),
  "base" => "wd_icon_text",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Title", 'flooring'),
      "param_name" => "title",
    ),
    array(
      "type" => "textarea",
      "heading" => esc_html__("Text", 'flooring'),
      "param_name" => "content",
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display image instead of icon", 'flooring'),
      "param_name" => "image_checkbox",
      'value' => array(esc_html__('Yes, please', 'flooring') => 'yes'),
    ),
    array(
      "type" => "attach_image", // it will bind a img choice in WP
      "heading" => esc_html__("Image", 'flooring'),
      "param_name" => "image",
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Icon', 'flooring'),
      'param_name' => 'icon',
      'value' => $icons,
      'description' => esc_html__('Select the icon to use.', 'flooring'),
      'admin_label' => true
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Layout', 'flooring'),
      'param_name' => 'layout',
      'value' => array('Layout 1' => '-style1',
        'Layout 2' => '-rtl',
        'Layout 3' => '-style2',
        'Layout 4' => '-style3',
        'Layout 5' => '-style5',
      ),
      'description' => esc_html__('Select the icon to use.', 'flooring'),
      'admin_label' => true
    ),
    array(
      "type" => "vc_link",
      "heading" => esc_html__("Link URL", 'flooring'),
      "param_name" => "icon_txt_url",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Extra Classes", 'flooring'),
      "param_name" => "extra_classes",
    ),
    $vc_add_css_animation
  )
));

/* Testimonial
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Testimonial", 'flooring'), // add a name
  "base" => "wd_testimonial", // bind with our shortcode
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true, // set this parameter when element will has a content
  "is_container" => FALSE, // set this param when you need to add a content element in this element
  // Here starts the definition of array with parameters of our compnent
  "params" => array(

    array(
      "type" => "textfield",
      "heading" => esc_html__("Maximum Number Of Items To Show", 'flooring'),
      "param_name" => "itemperpage",
    ),
      array(
          "type" => "colorpicker",
          "heading" => esc_html__("Text Color", 'flooring'),
          "param_name" => "font_color",
      ),
    $vc_add_css_animation
  )
));

/* Our Clients
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Carousel Client", 'flooring'),
  "base" => "wd_client",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      'type' => 'attach_images',
      'heading' => esc_html__('Images', 'flooring'),
      'param_name' => 'images',

    ), array(
      "type" => "dropdown",
      "heading" => esc_html__("Columns", 'flooring'),
      "param_name" => "columns",
      "value" => array('1', '2', '3', '4', '5', '6', '7'),
    ),
    $vc_add_css_animation
  )
));

/* Separator Title
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Wd Separator Title", 'flooring'),
  "base" => "wd_separator_title",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Title", 'flooring'),
      "param_name" => "wd_title",
    ), array(
      "type" => "textfield",
      "heading" => esc_html__("Subtitle", 'flooring'),
      "param_name" => "wd_subtitle",
    ), array(
      'type' => 'dropdown',
      'param_name' => 'wd_separator_style',
      'value' => array(
        __('Center', 'flooring') => 'wd-title-section_c',
        __('Left', 'flooring') => 'wd-title-section_l'
      ),
      'heading' => __('Wd Separator title Align', 'flooring')
    ),
    $vc_add_css_animation
  )
));

/* Count To
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Count Up", 'flooring'),
  "base" => "wd_count_up",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Title", 'flooring'),
      "param_name" => "title",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Countto (number)", 'flooring'),
      "param_name" => "countto",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("time (in seconds, only number)", 'flooring'),
      "param_name" => "time",
    ),
    array(
      "type" => "colorpicker",
      "heading" => esc_html__("Color", 'flooring'),
      "param_name" => "text_color",
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display image instead of icon", 'flooring'),
      "param_name" => "image_checkbox",
      'value' => array(esc_html__('Yes, please', 'flooring') => 'yes'),
    ),
    array(
      "type" => "attach_image", // it will bind a img choice in WP
      "heading" => esc_html__("Image", 'flooring'),
      "param_name" => "image",
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Icon', 'flooring'),
      'param_name' => 'icon',
      'value' => $icons,
      'description' => esc_html__('Select the icon to use.', 'flooring'),
      'admin_label' => true
    ),
    $vc_add_css_animation
  )
));
/* Count To
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Wd Slider", 'flooring'),
  "base" => "wd_slider",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      'type' => 'dropdown',
      'param_name' => 'flooring_slider_layout',
      'value' => array(
        __('Large Layout', 'flooring') => 'large',
        __('Fullscreen Layout', 'flooring') => 'fullscreen'
      )
    ),
  )
));

/* Team
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Team", 'flooring'), // add a name
  "base" => "wd_team", // bind with our shortcode
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true, // set this parameter when element will has a content
  "is_container" => FALSE, // set this param when you need to add a content element in this element
  // Here starts the definition of array with parameters of our compnent
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in mobile", 'flooring'),
      "param_name" => "columns_mobile",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in tablet", 'flooring'),
      "param_name" => "columns_tablet",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Columns To Display in desktop", 'flooring'),
      "param_name" => "columns_desktop",
      'description' => esc_html__('Used in Grid Layout', 'flooring'),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Items Per Page", 'flooring'),
      "param_name" => "itemperpage",
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display column gutters", 'flooring'),
      "param_name" => "team_collapse",
      "std" => "yes",
      'value' => array(esc_html__('Yes, please', 'flooring') => 'yes'),
    ),
    array(
      "type" => "checkbox",
      "heading" => esc_html__("Display team members description", 'flooring'),
      "param_name" => "show_description",
      "std" => "yes",
      'value' => array(esc_html__('Yes, please', 'flooring') => 'yes'),
    ),
    $vc_add_css_animation
  )
));


/* Wd Accordion
---------------------------------------------------------- */
vc_add_param("vc_tta_accordion",
  array(
    'type' => 'dropdown',
    'param_name' => 'flooring_accordion_style',
    'value' => array(
      __(' ', 'flooring') => '',
      __('Style 1', 'flooring') => 'flooring_accordion_style_d',
      __('Style 2', 'flooring') => 'flooring_accordion_style_l'
    ),
    'heading' => __('Use Wd Accordion Style', 'flooring')
  )
);


/* Call To Action
---------------------------------------------------------- */
vc_map(array(
  "name" => esc_html__("Wd Call To Action", 'flooring'),
  "base" => "wd_call_to_action",
  "icon" => get_template_directory_uri() . "/inc/images/icon/flooring_icon.png",
  "content_element" => true,
  "is_container" => FALSE,
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => esc_html__("Title", 'flooring'),
      "param_name" => "title",
    ),
    array(
      "type" => "textarea",
      "heading" => esc_html__("Text", 'flooring'),
      "param_name" => "text",
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Button Text", 'flooring'),
      "param_name" => "button_text",
    ),
    array(
      "type" => "vc_link",
      "heading" => esc_html__("Button URL", 'flooring'),
      "param_name" => "button_url",
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Layout', 'flooring'),
      'param_name' => 'layout',
      'value' => array('Layout 1' => '',
        'Layout 2' => '-invers',
      ),
    ),
    array(
      "type" => "textfield",
      "heading" => esc_html__("Extra Classes", 'flooring'),
      "param_name" => "extra_classes",
    ),
    $vc_add_css_animation
  )
));


// This function provides a functionality of adding content elements into element
class WPBakeryShortCode_SC_Slide extends WPBakeryShortCodesContainer
{
}