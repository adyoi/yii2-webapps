<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use backend\models\UserLevel;
use backend\models\UserMenu;

/* @var $this yii\web\View */
/* @var $model backend\models\UserMenu */
/* @var $form yii\widgets\ActiveForm */

$fontawesome = ['fab fa-accessible-icon' => 'fa-accessible-icon', 'fab fa-accusoft' => 'fa-accusoft', 'fab fa-acquisitions-incorporated' => 'fa-acquisitions-incorporated', 'fa fa-ad' => 'fa-ad', 'fa fa-address-book' => 'fa-address-book', 'fa fa-address-card' => 'fa-address-card', 'fa fa-adjust' => 'fa-adjust', 'fab fa-adn' => 'fa-adn', 'fab fa-adobe' => 'fa-adobe', 'fab fa-adversal' => 'fa-adversal', 'fab fa-affiliatetheme' => 'fa-affiliatetheme', 'fa fa-air-freshener' => 'fa-air-freshener', 'fab fa-airbnb' => 'fa-airbnb', 'fab fa-algolia' => 'fa-algolia', 'fa fa-align-center' => 'fa-align-center', 'fa fa-align-justify' => 'fa-align-justify', 'fa fa-align-left' => 'fa-align-left', 'fa fa-align-right' => 'fa-align-right', 'fab fa-alipay' => 'fa-alipay', 'fa fa-allergies' => 'fa-allergies', 'fab fa-amazon' => 'fa-amazon', 'fab fa-amazon-pay' => 'fa-amazon-pay', 'fa fa-ambulance' => 'fa-ambulance', 'fa fa-american-sign-language-interpreting' => 'fa-american-sign-language-interpreting', 'fab fa-amilia' => 'fa-amilia', 'fa fa-anchor' => 'fa-anchor', 'fab fa-android' => 'fa-android', 'fab fa-angellist' => 'fa-angellist', 'fa fa-angle-double-down' => 'fa-angle-double-down', 'fa fa-angle-double-left' => 'fa-angle-double-left', 'fa fa-angle-double-right' => 'fa-angle-double-right', 'fa fa-angle-double-up' => 'fa-angle-double-up', 'fa fa-angle-down' => 'fa-angle-down', 'fa fa-angle-left' => 'fa-angle-left', 'fa fa-angle-right' => 'fa-angle-right', 'fa fa-angle-up' => 'fa-angle-up', 'fa fa-angry' => 'fa-angry', 'fab fa-angrycreative' => 'fa-angrycreative', 'fab fa-angular' => 'fa-angular', 'fa fa-ankh' => 'fa-ankh', 'fab fa-app-store' => 'fa-app-store', 'fab fa-app-store-ios' => 'fa-app-store-ios', 'fab fa-apper' => 'fa-apper', 'fab fa-apple' => 'fa-apple', 'fa fa-apple-alt' => 'fa-apple-alt', 'fab fa-apple-pay' => 'fa-apple-pay', 'fa fa-archive' => 'fa-archive', 'fa fa-archway' => 'fa-archway', 'fa fa-arrow-alt-circle-down' => 'fa-arrow-alt-circle-down', 'fa fa-arrow-alt-circle-left' => 'fa-arrow-alt-circle-left', 'fa fa-arrow-alt-circle-right' => 'fa-arrow-alt-circle-right', 'fa fa-arrow-alt-circle-up' => 'fa-arrow-alt-circle-up', 'fa fa-arrow-circle-down' => 'fa-arrow-circle-down', 'fa fa-arrow-circle-left' => 'fa-arrow-circle-left', 'fa fa-arrow-circle-right' => 'fa-arrow-circle-right', 'fa fa-arrow-circle-up' => 'fa-arrow-circle-up', 'fa fa-arrow-down' => 'fa-arrow-down', 'fa fa-arrow-left' => 'fa-arrow-left', 'fa fa-arrow-right' => 'fa-arrow-right', 'fa fa-arrow-up' => 'fa-arrow-up', 'fa fa-arrows-alt' => 'fa-arrows-alt', 'fa fa-arrows-alt-h' => 'fa-arrows-alt-h', 'fa fa-arrows-alt-v' => 'fa-arrows-alt-v', 'fab fa-artstation' => 'fa-artstation', 'fa fa-assistive-listening-systems' => 'fa-assistive-listening-systems', 'fa fa-asterisk' => 'fa-asterisk', 'fab fa-asymmetrik' => 'fa-asymmetrik', 'fa fa-at' => 'fa-at', 'fa fa-atlas' => 'fa-atlas', 'fab fa-atlassian' => 'fa-atlassian', 'fa fa-atom' => 'fa-atom', 'fab fa-audible' => 'fa-audible', 'fa fa-audio-description' => 'fa-audio-description', 'fab fa-autoprefixer' => 'fa-autoprefixer', 'fab fa-avianex' => 'fa-avianex', 'fab fa-aviato' => 'fa-aviato', 'fa fa-award' => 'fa-award', 'fab fa-aws' => 'fa-aws', 'fa fa-baby' => 'fa-baby', 'fa fa-baby-carriage' => 'fa-baby-carriage', 'fa fa-backspace' => 'fa-backspace', 'fa fa-backward' => 'fa-backward', 'fa fa-bacon' => 'fa-bacon', 'fa fa-bahai' => 'fa-bahai', 'fa fa-balance-scale' => 'fa-balance-scale', 'fa fa-balance-scale-left' => 'fa-balance-scale-left', 'fa fa-balance-scale-right' => 'fa-balance-scale-right', 'fa fa-ban' => 'fa-ban', 'fa fa-band-aid' => 'fa-band-aid', 'fab fa-bandcamp' => 'fa-bandcamp', 'fa fa-barcode' => 'fa-barcode', 'fa fa-bars' => 'fa-bars', 'fa fa-baseball-ball' => 'fa-baseball-ball', 'fa fa-basketball-ball' => 'fa-basketball-ball', 'fa fa-bath' => 'fa-bath', 'fa fa-battery-empty' => 'fa-battery-empty', 'fa fa-battery-full' => 'fa-battery-full', 'fa fa-battery-half' => 'fa-battery-half', 'fa fa-battery-quarter' => 'fa-battery-quarter', 'fa fa-battery-three-quarters' => 'fa-battery-three-quarters', 'fab fa-battle-net' => 'fa-battle-net', 'fa fa-bed' => 'fa-bed', 'fa fa-beer' => 'fa-beer', 'fab fa-behance' => 'fa-behance', 'fab fa-behance-square' => 'fa-behance-square', 'fa fa-bell' => 'fa-bell', 'fa fa-bell-slash' => 'fa-bell-slash', 'fa fa-bezier-curve' => 'fa-bezier-curve', 'fa fa-bible' => 'fa-bible', 'fa fa-bicycle' => 'fa-bicycle', 'fa fa-biking' => 'fa-biking', 'fab fa-bimobject' => 'fa-bimobject', 'fa fa-binoculars' => 'fa-binoculars', 'fa fa-biohazard' => 'fa-biohazard', 'fa fa-birthday-cake' => 'fa-birthday-cake', 'fab fa-bitbucket' => 'fa-bitbucket', 'fab fa-bitcoin' => 'fa-bitcoin', 'fab fa-bity' => 'fa-bity', 'fab fa-black-tie' => 'fa-black-tie', 'fab fa-blackberry' => 'fa-blackberry', 'fa fa-blender' => 'fa-blender', 'fa fa-blender-phone' => 'fa-blender-phone', 'fa fa-blind' => 'fa-blind', 'fa fa-blog' => 'fa-blog', 'fab fa-blogger' => 'fa-blogger', 'fab fa-blogger-b' => 'fa-blogger-b', 'fab fa-bluetooth' => 'fa-bluetooth', 'fab fa-bluetooth-b' => 'fa-bluetooth-b', 'fa fa-bold' => 'fa-bold', 'fa fa-bolt' => 'fa-bolt', 'fa fa-bomb' => 'fa-bomb', 'fa fa-bone' => 'fa-bone', 'fa fa-bong' => 'fa-bong', 'fa fa-book' => 'fa-book', 'fa fa-book-dead' => 'fa-book-dead', 'fa fa-book-medical' => 'fa-book-medical', 'fa fa-book-open' => 'fa-book-open', 'fa fa-book-reader' => 'fa-book-reader', 'fa fa-bookmark' => 'fa-bookmark', 'fab fa-bootstrap' => 'fa-bootstrap', 'fa fa-border-all' => 'fa-border-all', 'fa fa-border-none' => 'fa-border-none', 'fa fa-border-style' => 'fa-border-style', 'fa fa-bowling-ball' => 'fa-bowling-ball', 'fa fa-box' => 'fa-box', 'fa fa-box-open' => 'fa-box-open', 'fa fa-box-tissue' => 'fa-box-tissue', 'fa fa-boxes' => 'fa-boxes', 'fa fa-braille' => 'fa-braille', 'fa fa-brain' => 'fa-brain', 'fa fa-bread-slice' => 'fa-bread-slice', 'fa fa-briefcase' => 'fa-briefcase', 'fa fa-briefcase-medical' => 'fa-briefcase-medical', 'fa fa-broadcast-tower' => 'fa-broadcast-tower', 'fa fa-broom' => 'fa-broom', 'fa fa-brush' => 'fa-brush', 'fab fa-btc' => 'fa-btc', 'fab fa-buffer' => 'fa-buffer', 'fa fa-bug' => 'fa-bug', 'fa fa-building' => 'fa-building', 'fa fa-bullhorn' => 'fa-bullhorn', 'fa fa-bullseye' => 'fa-bullseye', 'fa fa-burn' => 'fa-burn', 'fab fa-buromobelexperte' => 'fa-buromobelexperte', 'fa fa-bus' => 'fa-bus', 'fa fa-bus-alt' => 'fa-bus-alt', 'fa fa-business-time' => 'fa-business-time', 'fab fa-buy-n-large' => 'fa-buy-n-large', 'fab fa-buysellads' => 'fa-buysellads', 'fa fa-calculator' => 'fa-calculator', 'fa fa-calendar' => 'fa-calendar', 'fa fa-calendar-alt' => 'fa-calendar-alt', 'fa fa-calendar-check' => 'fa-calendar-check', 'fa fa-calendar-day' => 'fa-calendar-day', 'fa fa-calendar-minus' => 'fa-calendar-minus', 'fa fa-calendar-plus' => 'fa-calendar-plus', 'fa fa-calendar-times' => 'fa-calendar-times', 'fa fa-calendar-week' => 'fa-calendar-week', 'fa fa-camera' => 'fa-camera', 'fa fa-camera-retro' => 'fa-camera-retro', 'fa fa-campground' => 'fa-campground', 'fab fa-canadian-maple-leaf' => 'fa-canadian-maple-leaf', 'fa fa-candy-cane' => 'fa-candy-cane', 'fa fa-cannabis' => 'fa-cannabis', 'fa fa-capsules' => 'fa-capsules', 'fa fa-car' => 'fa-car', 'fa fa-car-alt' => 'fa-car-alt', 'fa fa-car-battery' => 'fa-car-battery', 'fa fa-car-crash' => 'fa-car-crash', 'fa fa-car-side' => 'fa-car-side', 'fa fa-caravan' => 'fa-caravan', 'fa fa-caret-down' => 'fa-caret-down', 'fa fa-caret-left' => 'fa-caret-left', 'fa fa-caret-right' => 'fa-caret-right', 'fa fa-caret-square-down' => 'fa-caret-square-down', 'fa fa-caret-square-left' => 'fa-caret-square-left', 'fa fa-caret-square-right' => 'fa-caret-square-right', 'fa fa-caret-square-up' => 'fa-caret-square-up', 'fa fa-caret-up' => 'fa-caret-up', 'fa fa-carrot' => 'fa-carrot', 'fa fa-cart-arrow-down' => 'fa-cart-arrow-down', 'fa fa-cart-plus' => 'fa-cart-plus', 'fa fa-cash-register' => 'fa-cash-register', 'fa fa-cat' => 'fa-cat', 'fab fa-cc-amazon-pay' => 'fa-cc-amazon-pay', 'fab fa-cc-amex' => 'fa-cc-amex', 'fab fa-cc-apple-pay' => 'fa-cc-apple-pay', 'fab fa-cc-diners-club' => 'fa-cc-diners-club', 'fab fa-cc-discover' => 'fa-cc-discover', 'fab fa-cc-jcb' => 'fa-cc-jcb', 'fab fa-cc-mastercard' => 'fa-cc-mastercard', 'fab fa-cc-paypal' => 'fa-cc-paypal', 'fab fa-cc-stripe' => 'fa-cc-stripe', 'fab fa-cc-visa' => 'fa-cc-visa', 'fab fa-centercode' => 'fa-centercode', 'fab fa-centos' => 'fa-centos', 'fa fa-certificate' => 'fa-certificate', 'fa fa-chair' => 'fa-chair', 'fa fa-chalkboard' => 'fa-chalkboard', 'fa fa-chalkboard-teacher' => 'fa-chalkboard-teacher', 'fa fa-charging-station' => 'fa-charging-station', 'fa fa-chart-area' => 'fa-chart-area', 'fa fa-chart-bar' => 'fa-chart-bar', 'fa fa-chart-line' => 'fa-chart-line', 'fa fa-chart-pie' => 'fa-chart-pie', 'fa fa-check' => 'fa-check', 'fa fa-check-circle' => 'fa-check-circle', 'fa fa-check-double' => 'fa-check-double', 'fa fa-check-square' => 'fa-check-square', 'fa fa-cheese' => 'fa-cheese', 'fa fa-chess' => 'fa-chess', 'fa fa-chess-bishop' => 'fa-chess-bishop', 'fa fa-chess-board' => 'fa-chess-board', 'fa fa-chess-king' => 'fa-chess-king', 'fa fa-chess-knight' => 'fa-chess-knight', 'fa fa-chess-pawn' => 'fa-chess-pawn', 'fa fa-chess-queen' => 'fa-chess-queen', 'fa fa-chess-rook' => 'fa-chess-rook', 'fa fa-chevron-circle-down' => 'fa-chevron-circle-down', 'fa fa-chevron-circle-left' => 'fa-chevron-circle-left', 'fa fa-chevron-circle-right' => 'fa-chevron-circle-right', 'fa fa-chevron-circle-up' => 'fa-chevron-circle-up', 'fa fa-chevron-down' => 'fa-chevron-down', 'fa fa-chevron-left' => 'fa-chevron-left', 'fa fa-chevron-right' => 'fa-chevron-right', 'fa fa-chevron-up' => 'fa-chevron-up', 'fa fa-child' => 'fa-child', 'fab fa-chrome' => 'fa-chrome', 'fab fa-chromecast' => 'fa-chromecast', 'fa fa-church' => 'fa-church', 'fa fa-circle' => 'fa-circle', 'fa fa-circle-notch' => 'fa-circle-notch', 'fa fa-city' => 'fa-city', 'fa fa-clinic-medical' => 'fa-clinic-medical', 'fa fa-clipboard' => 'fa-clipboard', 'fa fa-clipboard-check' => 'fa-clipboard-check', 'fa fa-clipboard-list' => 'fa-clipboard-list', 'fa fa-clock' => 'fa-clock', 'fa fa-clone' => 'fa-clone', 'fa fa-closed-captioning' => 'fa-closed-captioning', 'fa fa-cloud' => 'fa-cloud', 'fa fa-cloud-download-alt' => 'fa-cloud-download-alt', 'fa fa-cloud-meatball' => 'fa-cloud-meatball', 'fa fa-cloud-moon' => 'fa-cloud-moon', 'fa fa-cloud-moon-rain' => 'fa-cloud-moon-rain', 'fa fa-cloud-rain' => 'fa-cloud-rain', 'fa fa-cloud-showers-heavy' => 'fa-cloud-showers-heavy', 'fa fa-cloud-sun' => 'fa-cloud-sun', 'fa fa-cloud-sun-rain' => 'fa-cloud-sun-rain', 'fa fa-cloud-upload-alt' => 'fa-cloud-upload-alt', 'fab fa-cloudscale' => 'fa-cloudscale', 'fab fa-cloudsmith' => 'fa-cloudsmith', 'fab fa-cloudversify' => 'fa-cloudversify', 'fa fa-cocktail' => 'fa-cocktail', 'fa fa-code' => 'fa-code', 'fa fa-code-branch' => 'fa-code-branch', 'fab fa-codepen' => 'fa-codepen', 'fab fa-codiepie' => 'fa-codiepie', 'fa fa-coffee' => 'fa-coffee', 'fa fa-cog' => 'fa-cog', 'fa fa-cogs' => 'fa-cogs', 'fa fa-coins' => 'fa-coins', 'fa fa-columns' => 'fa-columns', 'fa fa-comment' => 'fa-comment', 'fa fa-comment-alt' => 'fa-comment-alt', 'fa fa-comment-dollar' => 'fa-comment-dollar', 'fa fa-comment-dots' => 'fa-comment-dots', 'fa fa-comment-medical' => 'fa-comment-medical', 'fa fa-comment-slash' => 'fa-comment-slash', 'fa fa-comments' => 'fa-comments', 'fa fa-comments-dollar' => 'fa-comments-dollar', 'fa fa-compact-disc' => 'fa-compact-disc', 'fa fa-compass' => 'fa-compass', 'fa fa-compress' => 'fa-compress', 'fa fa-compress-alt' => 'fa-compress-alt', 'fa fa-compress-arrows-alt' => 'fa-compress-arrows-alt', 'fa fa-concierge-bell' => 'fa-concierge-bell', 'fab fa-confluence' => 'fa-confluence', 'fab fa-connectdevelop' => 'fa-connectdevelop', 'fab fa-contao' => 'fa-contao', 'fa fa-cookie' => 'fa-cookie', 'fa fa-cookie-bite' => 'fa-cookie-bite', 'fa fa-copy' => 'fa-copy', 'fa fa-copyright' => 'fa-copyright', 'fab fa-cotton-bureau' => 'fa-cotton-bureau', 'fa fa-couch' => 'fa-couch', 'fab fa-cpanel' => 'fa-cpanel', 'fab fa-creative-commons' => 'fa-creative-commons', 'fab fa-creative-commons-by' => 'fa-creative-commons-by', 'fab fa-creative-commons-nc' => 'fa-creative-commons-nc', 'fab fa-creative-commons-nc-eu' => 'fa-creative-commons-nc-eu', 'fab fa-creative-commons-nc-jp' => 'fa-creative-commons-nc-jp', 'fab fa-creative-commons-nd' => 'fa-creative-commons-nd', 'fab fa-creative-commons-pd' => 'fa-creative-commons-pd', 'fab fa-creative-commons-pd-alt' => 'fa-creative-commons-pd-alt', 'fab fa-creative-commons-remix' => 'fa-creative-commons-remix', 'fab fa-creative-commons-sa' => 'fa-creative-commons-sa', 'fab fa-creative-commons-sampling' => 'fa-creative-commons-sampling', 'fab fa-creative-commons-sampling-plus' => 'fa-creative-commons-sampling-plus', 'fab fa-creative-commons-share' => 'fa-creative-commons-share', 'fab fa-creative-commons-zero' => 'fa-creative-commons-zero', 'fa fa-credit-card' => 'fa-credit-card', 'fab fa-critical-role' => 'fa-critical-role', 'fa fa-crop' => 'fa-crop', 'fa fa-crop-alt' => 'fa-crop-alt', 'fa fa-cross' => 'fa-cross', 'fa fa-crosshairs' => 'fa-crosshairs', 'fa fa-crow' => 'fa-crow', 'fa fa-crown' => 'fa-crown', 'fa fa-crutch' => 'fa-crutch', 'fab fa-css3' => 'fa-css3', 'fab fa-css3-alt' => 'fa-css3-alt', 'fa fa-cube' => 'fa-cube', 'fa fa-cubes' => 'fa-cubes', 'fa fa-cut' => 'fa-cut', 'fab fa-cuttlefish' => 'fa-cuttlefish', 'fab fa-d-and-d' => 'fa-d-and-d', 'fab fa-d-and-d-beyond' => 'fa-d-and-d-beyond', 'fa fa-dailymotion' => 'fa-dailymotion', 'fab fa-dashcube' => 'fa-dashcube', 'fa fa-database' => 'fa-database', 'fa fa-deaf' => 'fa-deaf', 'fab fa-delicious' => 'fa-delicious', 'fa fa-democrat' => 'fa-democrat', 'fab fa-deploydog' => 'fa-deploydog', 'fab fa-deskpro' => 'fa-deskpro', 'fa fa-desktop' => 'fa-desktop', 'fab fa-dev' => 'fa-dev', 'fab fa-deviantart' => 'fa-deviantart', 'fa fa-dharmachakra' => 'fa-dharmachakra', 'fab fa-dhl' => 'fa-dhl', 'fa fa-diagnoses' => 'fa-diagnoses', 'fab fa-diaspora' => 'fa-diaspora', 'fa fa-dice' => 'fa-dice', 'fa fa-dice-d20' => 'fa-dice-d20', 'fa fa-dice-d6' => 'fa-dice-d6', 'fa fa-dice-five' => 'fa-dice-five', 'fa fa-dice-four' => 'fa-dice-four', 'fa fa-dice-one' => 'fa-dice-one', 'fa fa-dice-six' => 'fa-dice-six', 'fa fa-dice-three' => 'fa-dice-three', 'fa fa-dice-two' => 'fa-dice-two', 'fab fa-digg' => 'fa-digg', 'fab fa-digital-ocean' => 'fa-digital-ocean', 'fa fa-digital-tachograph' => 'fa-digital-tachograph', 'fa fa-directions' => 'fa-directions', 'fab fa-discord' => 'fa-discord', 'fab fa-discourse' => 'fa-discourse', 'fa fa-disease' => 'fa-disease', 'fa fa-divide' => 'fa-divide', 'fa fa-dizzy' => 'fa-dizzy', 'fa fa-dna' => 'fa-dna', 'fab fa-dochub' => 'fa-dochub', 'fab fa-docker' => 'fa-docker', 'fa fa-dog' => 'fa-dog', 'fa fa-dollar-sign' => 'fa-dollar-sign', 'fa fa-dolly' => 'fa-dolly', 'fa fa-dolly-flatbed' => 'fa-dolly-flatbed', 'fa fa-donate' => 'fa-donate', 'fa fa-door-closed' => 'fa-door-closed', 'fa fa-door-open' => 'fa-door-open', 'fa fa-dot-circle' => 'fa-dot-circle', 'fa fa-dove' => 'fa-dove', 'fa fa-download' => 'fa-download', 'fab fa-draft2digital' => 'fa-draft2digital', 'fa fa-drafting-compass' => 'fa-drafting-compass', 'fa fa-dragon' => 'fa-dragon', 'fa fa-draw-polygon' => 'fa-draw-polygon', 'fab fa-dribbble' => 'fa-dribbble', 'fab fa-dribbble-square' => 'fa-dribbble-square', 'fab fa-dropbox' => 'fa-dropbox', 'fa fa-drum' => 'fa-drum', 'fa fa-drum-steelpan' => 'fa-drum-steelpan', 'fa fa-drumstick-bite' => 'fa-drumstick-bite', 'fab fa-drupal' => 'fa-drupal', 'fa fa-dumbbell' => 'fa-dumbbell', 'fa fa-dumpster' => 'fa-dumpster', 'fa fa-dumpster-fire' => 'fa-dumpster-fire', 'fa fa-dungeon' => 'fa-dungeon', 'fab fa-dyalog' => 'fa-dyalog', 'fab fa-earlybirds' => 'fa-earlybirds', 'fab fa-ebay' => 'fa-ebay', 'fab fa-edge' => 'fa-edge', 'fa fa-edit' => 'fa-edit', 'fa fa-egg' => 'fa-egg', 'fa fa-eject' => 'fa-eject', 'fab fa-elementor' => 'fa-elementor', 'fa fa-ellipsis-h' => 'fa-ellipsis-h', 'fa fa-ellipsis-v' => 'fa-ellipsis-v', 'fab fa-ello' => 'fa-ello', 'fab fa-ember' => 'fa-ember', 'fab fa-empire' => 'fa-empire', 'fa fa-envelope' => 'fa-envelope', 'fa fa-envelope-open' => 'fa-envelope-open', 'fa fa-envelope-open-text' => 'fa-envelope-open-text', 'fa fa-envelope-square' => 'fa-envelope-square', 'fab fa-envira' => 'fa-envira', 'fa fa-equals' => 'fa-equals', 'fa fa-eraser' => 'fa-eraser', 'fab fa-erlang' => 'fa-erlang', 'fab fa-ethereum' => 'fa-ethereum', 'fa fa-ethernet' => 'fa-ethernet', 'fab fa-etsy' => 'fa-etsy', 'fa fa-euro-sign' => 'fa-euro-sign', 'fab fa-evernote' => 'fa-evernote', 'fa fa-exchange-alt' => 'fa-exchange-alt', 'fa fa-exclamation' => 'fa-exclamation', 'fa fa-exclamation-circle' => 'fa-exclamation-circle', 'fa fa-exclamation-triangle' => 'fa-exclamation-triangle', 'fa fa-expand' => 'fa-expand', 'fa fa-expand-alt' => 'fa-expand-alt', 'fa fa-expand-arrows-alt' => 'fa-expand-arrows-alt', 'fab fa-expeditedssl' => 'fa-expeditedssl', 'fa fa-external-link-alt' => 'fa-external-link-alt', 'fa fa-external-link-square-alt' => 'fa-external-link-square-alt', 'fa fa-eye' => 'fa-eye', 'fa fa-eye-dropper' => 'fa-eye-dropper', 'fa fa-eye-slash' => 'fa-eye-slash', 'fab fa-facebook' => 'fa-facebook', 'fab fa-facebook-f' => 'fa-facebook-f', 'fab fa-facebook-messenger' => 'fa-facebook-messenger', 'fab fa-facebook-square' => 'fa-facebook-square', 'fa fa-fan' => 'fa-fan', 'fab fa-fantasy-flight-games' => 'fa-fantasy-flight-games', 'fa fa-fast-backward' => 'fa-fast-backward', 'fa fa-fast-forward' => 'fa-fast-forward', 'fa fa-faucet' => 'fa-faucet', 'fa fa-fax' => 'fa-fax', 'fa fa-feather' => 'fa-feather', 'fa fa-feather-alt' => 'fa-feather-alt', 'fab fa-fedex' => 'fa-fedex', 'fab fa-fedora' => 'fa-fedora', 'fa fa-female' => 'fa-female', 'fa fa-fighter-jet' => 'fa-fighter-jet', 'fab fa-figma' => 'fa-figma', 'fa fa-file' => 'fa-file', 'fa fa-file-alt' => 'fa-file-alt', 'fa fa-file-archive' => 'fa-file-archive', 'fa fa-file-audio' => 'fa-file-audio', 'fa fa-file-code' => 'fa-file-code', 'fa fa-file-contract' => 'fa-file-contract', 'fa fa-file-csv' => 'fa-file-csv', 'fa fa-file-download' => 'fa-file-download', 'fa fa-file-excel' => 'fa-file-excel', 'fa fa-file-export' => 'fa-file-export', 'fa fa-file-image' => 'fa-file-image', 'fa fa-file-import' => 'fa-file-import', 'fa fa-file-invoice' => 'fa-file-invoice', 'fa fa-file-invoice-dollar' => 'fa-file-invoice-dollar', 'fa fa-file-medical' => 'fa-file-medical', 'fa fa-file-medical-alt' => 'fa-file-medical-alt', 'fa fa-file-pdf' => 'fa-file-pdf', 'fa fa-file-powerpoint' => 'fa-file-powerpoint', 'fa fa-file-prescription' => 'fa-file-prescription', 'fa fa-file-signature' => 'fa-file-signature', 'fa fa-file-upload' => 'fa-file-upload', 'fa fa-file-video' => 'fa-file-video', 'fa fa-file-word' => 'fa-file-word', 'fa fa-fill' => 'fa-fill', 'fa fa-fill-drip' => 'fa-fill-drip', 'fa fa-film' => 'fa-film', 'fa fa-filter' => 'fa-filter', 'fa fa-fingerprint' => 'fa-fingerprint', 'fa fa-fire' => 'fa-fire', 'fa fa-fire-alt' => 'fa-fire-alt', 'fa fa-fire-extinguisher' => 'fa-fire-extinguisher', 'fab fa-firefox' => 'fa-firefox', 'fa fa-firefox-browser' => 'fa-firefox-browser', 'fa fa-first-aid' => 'fa-first-aid', 'fab fa-first-order' => 'fa-first-order', 'fab fa-first-order-alt' => 'fa-first-order-alt', 'fab fa-firstdraft' => 'fa-firstdraft', 'fa fa-fish' => 'fa-fish', 'fa fa-fist-raised' => 'fa-fist-raised', 'fa fa-flag' => 'fa-flag', 'fa fa-flag-checkered' => 'fa-flag-checkered', 'fa fa-flag-usa' => 'fa-flag-usa', 'fa fa-flask' => 'fa-flask', 'fab fa-flickr' => 'fa-flickr', 'fab fa-flipboard' => 'fa-flipboard', 'fa fa-flushed' => 'fa-flushed', 'fab fa-fly' => 'fa-fly', 'fa fa-folder' => 'fa-folder', 'fa fa-folder-minus' => 'fa-folder-minus', 'fa fa-folder-open' => 'fa-folder-open', 'fa fa-folder-plus' => 'fa-folder-plus', 'fa fa-font' => 'fa-font', 'fab fa-font-awesome' => 'fa-font-awesome', 'fab fa-font-awesome-alt' => 'fa-font-awesome-alt', 'fab fa-font-awesome-flag' => 'fa-font-awesome-flag', 'fa fa-font-awesome-logo-full' => 'fa-font-awesome-logo-full', 'fab fa-fonticons' => 'fa-fonticons', 'fab fa-fonticons-fi' => 'fa-fonticons-fi', 'fa fa-football-ball' => 'fa-football-ball', 'fab fa-fort-awesome' => 'fa-fort-awesome', 'fab fa-fort-awesome-alt' => 'fa-fort-awesome-alt', 'fab fa-forumbee' => 'fa-forumbee', 'fa fa-forward' => 'fa-forward', 'fab fa-foursquare' => 'fa-foursquare', 'fab fa-free-code-camp' => 'fa-free-code-camp', 'fab fa-freebsd' => 'fa-freebsd', 'fa fa-frog' => 'fa-frog', 'fa fa-frown' => 'fa-frown', 'fa fa-frown-open' => 'fa-frown-open', 'fab fa-fulcrum' => 'fa-fulcrum', 'fa fa-funnel-dollar' => 'fa-funnel-dollar', 'fa fa-futbol' => 'fa-futbol', 'fab fa-galactic-republic' => 'fa-galactic-republic', 'fab fa-galactic-senate' => 'fa-galactic-senate', 'fa fa-gamepad' => 'fa-gamepad', 'fa fa-gas-pump' => 'fa-gas-pump', 'fa fa-gavel' => 'fa-gavel', 'fa fa-gem' => 'fa-gem', 'fa fa-genderless' => 'fa-genderless', 'fab fa-get-pocket' => 'fa-get-pocket', 'fab fa-gg' => 'fa-gg', 'fab fa-gg-circle' => 'fa-gg-circle', 'fa fa-ghost' => 'fa-ghost', 'fa fa-gift' => 'fa-gift', 'fa fa-gifts' => 'fa-gifts', 'fab fa-git' => 'fa-git', 'fab fa-git-alt' => 'fa-git-alt', 'fab fa-git-square' => 'fa-git-square', 'fab fa-github' => 'fa-github', 'fab fa-github-alt' => 'fa-github-alt', 'fab fa-github-square' => 'fa-github-square', 'fab fa-gitkraken' => 'fa-gitkraken', 'fab fa-gitlab' => 'fa-gitlab', 'fab fa-gitter' => 'fa-gitter', 'fa fa-glass-cheers' => 'fa-glass-cheers', 'fa fa-glass-martini' => 'fa-glass-martini', 'fa fa-glass-martini-alt' => 'fa-glass-martini-alt', 'fa fa-glass-whiskey' => 'fa-glass-whiskey', 'fa fa-glasses' => 'fa-glasses', 'fab fa-glide' => 'fa-glide', 'fab fa-glide-g' => 'fa-glide-g', 'fa fa-globe' => 'fa-globe', 'fa fa-globe-africa' => 'fa-globe-africa', 'fa fa-globe-americas' => 'fa-globe-americas', 'fa fa-globe-asia' => 'fa-globe-asia', 'fa fa-globe-europe' => 'fa-globe-europe', 'fab fa-gofore' => 'fa-gofore', 'fa fa-golf-ball' => 'fa-golf-ball', 'fab fa-goodreads' => 'fa-goodreads', 'fab fa-goodreads-g' => 'fa-goodreads-g', 'fab fa-google' => 'fa-google', 'fab fa-google-drive' => 'fa-google-drive', 'fab fa-google-play' => 'fa-google-play', 'fab fa-google-plus' => 'fa-google-plus', 'fab fa-google-plus-g' => 'fa-google-plus-g', 'fab fa-google-plus-square' => 'fa-google-plus-square', 'fab fa-google-wallet' => 'fa-google-wallet', 'fa fa-gopuram' => 'fa-gopuram', 'fa fa-graduation-cap' => 'fa-graduation-cap', 'fab fa-gratipay' => 'fa-gratipay', 'fab fa-grav' => 'fa-grav', 'fa fa-greater-than' => 'fa-greater-than', 'fa fa-greater-than-equal' => 'fa-greater-than-equal', 'fa fa-grimace' => 'fa-grimace', 'fa fa-grin' => 'fa-grin', 'fa fa-grin-alt' => 'fa-grin-alt', 'fa fa-grin-beam' => 'fa-grin-beam', 'fa fa-grin-beam-sweat' => 'fa-grin-beam-sweat', 'fa fa-grin-hearts' => 'fa-grin-hearts', 'fa fa-grin-squint' => 'fa-grin-squint', 'fa fa-grin-squint-tears' => 'fa-grin-squint-tears', 'fa fa-grin-stars' => 'fa-grin-stars', 'fa fa-grin-tears' => 'fa-grin-tears', 'fa fa-grin-tongue' => 'fa-grin-tongue', 'fa fa-grin-tongue-squint' => 'fa-grin-tongue-squint', 'fa fa-grin-tongue-wink' => 'fa-grin-tongue-wink', 'fa fa-grin-wink' => 'fa-grin-wink', 'fa fa-grip-horizontal' => 'fa-grip-horizontal', 'fa fa-grip-lines' => 'fa-grip-lines', 'fa fa-grip-lines-vertical' => 'fa-grip-lines-vertical', 'fa fa-grip-vertical' => 'fa-grip-vertical', 'fab fa-gripfire' => 'fa-gripfire', 'fab fa-grunt' => 'fa-grunt', 'fa fa-guitar' => 'fa-guitar', 'fab fa-gulp' => 'fa-gulp', 'fa fa-h-square' => 'fa-h-square', 'fab fa-hacker-news' => 'fa-hacker-news', 'fab fa-hacker-news-square' => 'fa-hacker-news-square', 'fab fa-hackerrank' => 'fa-hackerrank', 'fa fa-hamburger' => 'fa-hamburger', 'fa fa-hammer' => 'fa-hammer', 'fa fa-hamsa' => 'fa-hamsa', 'fa fa-hand-holding' => 'fa-hand-holding', 'fa fa-hand-holding-heart' => 'fa-hand-holding-heart', 'fa fa-hand-holding-medical' => 'fa-hand-holding-medical', 'fa fa-hand-holding-usd' => 'fa-hand-holding-usd', 'fa fa-hand-holding-water' => 'fa-hand-holding-water', 'fa fa-hand-lizard' => 'fa-hand-lizard', 'fa fa-hand-middle-finger' => 'fa-hand-middle-finger', 'fa fa-hand-paper' => 'fa-hand-paper', 'fa fa-hand-peace' => 'fa-hand-peace', 'fa fa-hand-point-down' => 'fa-hand-point-down', 'fa fa-hand-point-left' => 'fa-hand-point-left', 'fa fa-hand-point-right' => 'fa-hand-point-right', 'fa fa-hand-point-up' => 'fa-hand-point-up', 'fa fa-hand-pointer' => 'fa-hand-pointer', 'fa fa-hand-rock' => 'fa-hand-rock', 'fa fa-hand-scissors' => 'fa-hand-scissors', 'fa fa-hand-sparkles' => 'fa-hand-sparkles', 'fa fa-hand-spock' => 'fa-hand-spock', 'fa fa-hands' => 'fa-hands', 'fa fa-hands-helping' => 'fa-hands-helping', 'fa fa-hands-wash' => 'fa-hands-wash', 'fa fa-handshake' => 'fa-handshake', 'fa fa-handshake-alt-slash' => 'fa-handshake-alt-slash', 'fa fa-handshake-slash' => 'fa-handshake-slash', 'fa fa-hanukiah' => 'fa-hanukiah', 'fa fa-hard-hat' => 'fa-hard-hat', 'fa fa-hashtag' => 'fa-hashtag', 'fa fa-hat-cowboy' => 'fa-hat-cowboy', 'fa fa-hat-cowboy-side' => 'fa-hat-cowboy-side', 'fa fa-hat-wizard' => 'fa-hat-wizard', 'fa fa-hdd' => 'fa-hdd', 'fa fa-head-side-cough' => 'fa-head-side-cough', 'fa fa-head-side-cough-slash' => 'fa-head-side-cough-slash', 'fa fa-head-side-mask' => 'fa-head-side-mask', 'fa fa-head-side-virus' => 'fa-head-side-virus', 'fa fa-heading' => 'fa-heading', 'fa fa-headphones' => 'fa-headphones', 'fa fa-headphones-alt' => 'fa-headphones-alt', 'fa fa-headset' => 'fa-headset', 'fa fa-heart' => 'fa-heart', 'fa fa-heart-broken' => 'fa-heart-broken', 'fa fa-heartbeat' => 'fa-heartbeat', 'fa fa-helicopter' => 'fa-helicopter', 'fa fa-highlighter' => 'fa-highlighter', 'fa fa-hiking' => 'fa-hiking', 'fa fa-hippo' => 'fa-hippo', 'fab fa-hips' => 'fa-hips', 'fab fa-hire-a-helper' => 'fa-hire-a-helper', 'fa fa-history' => 'fa-history', 'fa fa-hockey-puck' => 'fa-hockey-puck', 'fa fa-holly-berry' => 'fa-holly-berry', 'fa fa-home' => 'fa-home', 'fab fa-hooli' => 'fa-hooli', 'fab fa-hornbill' => 'fa-hornbill', 'fa fa-horse' => 'fa-horse', 'fa fa-horse-head' => 'fa-horse-head', 'fa fa-hospital' => 'fa-hospital', 'fa fa-hospital-alt' => 'fa-hospital-alt', 'fa fa-hospital-symbol' => 'fa-hospital-symbol', 'fa fa-hospital-user' => 'fa-hospital-user', 'fa fa-hot-tub' => 'fa-hot-tub', 'fa fa-hotdog' => 'fa-hotdog', 'fa fa-hotel' => 'fa-hotel', 'fab fa-hotjar' => 'fa-hotjar', 'fa fa-hourglass' => 'fa-hourglass', 'fa fa-hourglass-end' => 'fa-hourglass-end', 'fa fa-hourglass-half' => 'fa-hourglass-half', 'fa fa-hourglass-start' => 'fa-hourglass-start', 'fa fa-house-damage' => 'fa-house-damage', 'fa fa-house-user' => 'fa-house-user', 'fab fa-houzz' => 'fa-houzz', 'fa fa-hryvnia' => 'fa-hryvnia', 'fab fa-html5' => 'fa-html5', 'fab fa-hubspot' => 'fa-hubspot', 'fa fa-i-cursor' => 'fa-i-cursor', 'fa fa-ice-cream' => 'fa-ice-cream', 'fa fa-icicles' => 'fa-icicles', 'fa fa-icons' => 'fa-icons', 'fa fa-id-badge' => 'fa-id-badge', 'fa fa-id-card' => 'fa-id-card', 'fa fa-id-card-alt' => 'fa-id-card-alt', 'fa fa-ideal' => 'fa-ideal', 'fa fa-igloo' => 'fa-igloo', 'fa fa-image' => 'fa-image', 'fa fa-images' => 'fa-images', 'fab fa-imdb' => 'fa-imdb', 'fa fa-inbox' => 'fa-inbox', 'fa fa-indent' => 'fa-indent', 'fa fa-industry' => 'fa-industry', 'fa fa-infinity' => 'fa-infinity', 'fa fa-info' => 'fa-info', 'fa fa-info-circle' => 'fa-info-circle', 'fab fa-instagram' => 'fa-instagram', 'fa fa-instagram-square' => 'fa-instagram-square', 'fab fa-intercom' => 'fa-intercom', 'fab fa-internet-explorer' => 'fa-internet-explorer', 'fab fa-invision' => 'fa-invision', 'fab fa-ioxhost' => 'fa-ioxhost', 'fa fa-italic' => 'fa-italic', 'fab fa-itch-io' => 'fa-itch-io', 'fab fa-itunes' => 'fa-itunes', 'fab fa-itunes-note' => 'fa-itunes-note', 'fab fa-java' => 'fa-java', 'fa fa-jedi' => 'fa-jedi', 'fab fa-jedi-order' => 'fa-jedi-order', 'fab fa-jenkins' => 'fa-jenkins', 'fab fa-jira' => 'fa-jira', 'fab fa-joget' => 'fa-joget', 'fa fa-joint' => 'fa-joint', 'fab fa-joomla' => 'fa-joomla', 'fa fa-journal-whills' => 'fa-journal-whills', 'fab fa-js' => 'fa-js', 'fab fa-js-square' => 'fa-js-square', 'fab fa-jsfiddle' => 'fa-jsfiddle', 'fa fa-kaaba' => 'fa-kaaba', 'fab fa-kaggle' => 'fa-kaggle', 'fa fa-key' => 'fa-key', 'fab fa-keybase' => 'fa-keybase', 'fa fa-keyboard' => 'fa-keyboard', 'fab fa-keycdn' => 'fa-keycdn', 'fa fa-khanda' => 'fa-khanda', 'fab fa-kickstarter' => 'fa-kickstarter', 'fab fa-kickstarter-k' => 'fa-kickstarter-k', 'fa fa-kiss' => 'fa-kiss', 'fa fa-kiss-beam' => 'fa-kiss-beam', 'fa fa-kiss-wink-heart' => 'fa-kiss-wink-heart', 'fa fa-kiwi-bird' => 'fa-kiwi-bird', 'fab fa-korvue' => 'fa-korvue', 'fa fa-landmark' => 'fa-landmark', 'fa fa-language' => 'fa-language', 'fa fa-laptop' => 'fa-laptop', 'fa fa-laptop-code' => 'fa-laptop-code', 'fa fa-laptop-house' => 'fa-laptop-house', 'fa fa-laptop-medical' => 'fa-laptop-medical', 'fab fa-laravel' => 'fa-laravel', 'fab fa-lastfm' => 'fa-lastfm', 'fab fa-lastfm-square' => 'fa-lastfm-square', 'fa fa-laugh' => 'fa-laugh', 'fa fa-laugh-beam' => 'fa-laugh-beam', 'fa fa-laugh-squint' => 'fa-laugh-squint', 'fa fa-laugh-wink' => 'fa-laugh-wink', 'fa fa-layer-group' => 'fa-layer-group', 'fa fa-leaf' => 'fa-leaf', 'fab fa-leanpub' => 'fa-leanpub', 'fa fa-lemon' => 'fa-lemon', 'fab fa-less' => 'fa-less', 'fa fa-less-than' => 'fa-less-than', 'fa fa-less-than-equal' => 'fa-less-than-equal', 'fa fa-level-down-alt' => 'fa-level-down-alt', 'fa fa-level-up-alt' => 'fa-level-up-alt', 'fa fa-life-ring' => 'fa-life-ring', 'fa fa-lightbulb' => 'fa-lightbulb', 'fab fa-line' => 'fa-line', 'fa fa-link' => 'fa-link', 'fab fa-linkedin' => 'fa-linkedin', 'fab fa-linkedin-in' => 'fa-linkedin-in', 'fab fa-linode' => 'fa-linode', 'fab fa-linux' => 'fa-linux', 'fa fa-lira-sign' => 'fa-lira-sign', 'fa fa-list' => 'fa-list', 'fa fa-list-alt' => 'fa-list-alt', 'fa fa-list-ol' => 'fa-list-ol', 'fa fa-list-ul' => 'fa-list-ul', 'fa fa-location-arrow' => 'fa-location-arrow', 'fa fa-lock' => 'fa-lock', 'fa fa-lock-open' => 'fa-lock-open', 'fa fa-long-arrow-alt-down' => 'fa-long-arrow-alt-down', 'fa fa-long-arrow-alt-left' => 'fa-long-arrow-alt-left', 'fa fa-long-arrow-alt-right' => 'fa-long-arrow-alt-right', 'fa fa-long-arrow-alt-up' => 'fa-long-arrow-alt-up', 'fa fa-low-vision' => 'fa-low-vision', 'fa fa-luggage-cart' => 'fa-luggage-cart', 'fa fa-lungs' => 'fa-lungs', 'fa fa-lungs-virus' => 'fa-lungs-virus', 'fab fa-lyft' => 'fa-lyft', 'fab fa-magento' => 'fa-magento', 'fa fa-magic' => 'fa-magic', 'fa fa-magnet' => 'fa-magnet', 'fa fa-mail-bulk' => 'fa-mail-bulk', 'fab fa-mailchimp' => 'fa-mailchimp', 'fa fa-male' => 'fa-male', 'fab fa-mandalorian' => 'fa-mandalorian', 'fa fa-map' => 'fa-map', 'fa fa-map-marked' => 'fa-map-marked', 'fa fa-map-marked-alt' => 'fa-map-marked-alt', 'fa fa-map-marker' => 'fa-map-marker', 'fa fa-map-marker-alt' => 'fa-map-marker-alt', 'fa fa-map-pin' => 'fa-map-pin', 'fa fa-map-signs' => 'fa-map-signs', 'fab fa-markdown' => 'fa-markdown', 'fa fa-marker' => 'fa-marker', 'fa fa-mars' => 'fa-mars', 'fa fa-mars-double' => 'fa-mars-double', 'fa fa-mars-stroke' => 'fa-mars-stroke', 'fa fa-mars-stroke-h' => 'fa-mars-stroke-h', 'fa fa-mars-stroke-v' => 'fa-mars-stroke-v', 'fa fa-mask' => 'fa-mask', 'fab fa-mastodon' => 'fa-mastodon', 'fab fa-maxcdn' => 'fa-maxcdn', 'fab fa-mdb' => 'fa-mdb', 'fa fa-medal' => 'fa-medal', 'fab fa-medapps' => 'fa-medapps', 'fab fa-medium' => 'fa-medium', 'fab fa-medium-m' => 'fa-medium-m', 'fa fa-medkit' => 'fa-medkit', 'fab fa-medrt' => 'fa-medrt', 'fab fa-meetup' => 'fa-meetup', 'fab fa-megaport' => 'fa-megaport', 'fa fa-meh' => 'fa-meh', 'fa fa-meh-blank' => 'fa-meh-blank', 'fa fa-meh-rolling-eyes' => 'fa-meh-rolling-eyes', 'fa fa-memory' => 'fa-memory', 'fab fa-mendeley' => 'fa-mendeley', 'fa fa-menorah' => 'fa-menorah', 'fa fa-mercury' => 'fa-mercury', 'fa fa-meteor' => 'fa-meteor', 'fa fa-microblog' => 'fa-microblog', 'fa fa-microchip' => 'fa-microchip', 'fa fa-microphone' => 'fa-microphone', 'fa fa-microphone-alt' => 'fa-microphone-alt', 'fa fa-microphone-alt-slash' => 'fa-microphone-alt-slash', 'fa fa-microphone-slash' => 'fa-microphone-slash', 'fa fa-microscope' => 'fa-microscope', 'fab fa-microsoft' => 'fa-microsoft', 'fa fa-minus' => 'fa-minus', 'fa fa-minus-circle' => 'fa-minus-circle', 'fa fa-minus-square' => 'fa-minus-square', 'fa fa-mitten' => 'fa-mitten', 'fab fa-mix' => 'fa-mix', 'fab fa-mixcloud' => 'fa-mixcloud', 'fa fa-mixer' => 'fa-mixer', 'fab fa-mizuni' => 'fa-mizuni', 'fa fa-mobile' => 'fa-mobile', 'fa fa-mobile-alt' => 'fa-mobile-alt', 'fab fa-modx' => 'fa-modx', 'fab fa-monero' => 'fa-monero', 'fa fa-money-bill' => 'fa-money-bill', 'fa fa-money-bill-alt' => 'fa-money-bill-alt', 'fa fa-money-bill-wave' => 'fa-money-bill-wave', 'fa fa-money-bill-wave-alt' => 'fa-money-bill-wave-alt', 'fa fa-money-check' => 'fa-money-check', 'fa fa-money-check-alt' => 'fa-money-check-alt', 'fa fa-monument' => 'fa-monument', 'fa fa-moon' => 'fa-moon', 'fa fa-mortar-pestle' => 'fa-mortar-pestle', 'fa fa-mosque' => 'fa-mosque', 'fa fa-motorcycle' => 'fa-motorcycle', 'fa fa-mountain' => 'fa-mountain', 'fa fa-mouse' => 'fa-mouse', 'fa fa-mouse-pointer' => 'fa-mouse-pointer', 'fa fa-mug-hot' => 'fa-mug-hot', 'fa fa-music' => 'fa-music', 'fab fa-napster' => 'fa-napster', 'fab fa-neos' => 'fa-neos', 'fa fa-network-wired' => 'fa-network-wired', 'fa fa-neuter' => 'fa-neuter', 'fa fa-newspaper' => 'fa-newspaper', 'fab fa-nimblr' => 'fa-nimblr', 'fab fa-node' => 'fa-node', 'fab fa-node-js' => 'fa-node-js', 'fa fa-not-equal' => 'fa-not-equal', 'fa fa-notes-medical' => 'fa-notes-medical', 'fab fa-npm' => 'fa-npm', 'fab fa-ns8' => 'fa-ns8', 'fab fa-nutritionix' => 'fa-nutritionix', 'fa fa-object-group' => 'fa-object-group', 'fa fa-object-ungroup' => 'fa-object-ungroup', 'fab fa-odnoklassniki' => 'fa-odnoklassniki', 'fab fa-odnoklassniki-square' => 'fa-odnoklassniki-square', 'fa fa-oil-can' => 'fa-oil-can', 'fab fa-old-republic' => 'fa-old-republic', 'fa fa-om' => 'fa-om', 'fab fa-opencart' => 'fa-opencart', 'fab fa-openid' => 'fa-openid', 'fab fa-opera' => 'fa-opera', 'fab fa-optin-monster' => 'fa-optin-monster', 'fab fa-orcid' => 'fa-orcid', 'fab fa-osi' => 'fa-osi', 'fa fa-otter' => 'fa-otter', 'fa fa-outdent' => 'fa-outdent', 'fab fa-page4' => 'fa-page4', 'fab fa-pagelines' => 'fa-pagelines', 'fa fa-pager' => 'fa-pager', 'fa fa-paint-brush' => 'fa-paint-brush', 'fa fa-paint-roller' => 'fa-paint-roller', 'fa fa-palette' => 'fa-palette', 'fab fa-palfed' => 'fa-palfed', 'fa fa-pallet' => 'fa-pallet', 'fa fa-paper-plane' => 'fa-paper-plane', 'fa fa-paperclip' => 'fa-paperclip', 'fa fa-parachute-box' => 'fa-parachute-box', 'fa fa-paragraph' => 'fa-paragraph', 'fa fa-parking' => 'fa-parking', 'fa fa-passport' => 'fa-passport', 'fa fa-pastafarianism' => 'fa-pastafarianism', 'fa fa-paste' => 'fa-paste', 'fab fa-patreon' => 'fa-patreon', 'fa fa-pause' => 'fa-pause', 'fa fa-pause-circle' => 'fa-pause-circle', 'fa fa-paw' => 'fa-paw', 'fab fa-paypal' => 'fa-paypal', 'fa fa-peace' => 'fa-peace', 'fa fa-pen' => 'fa-pen', 'fa fa-pen-alt' => 'fa-pen-alt', 'fa fa-pen-fancy' => 'fa-pen-fancy', 'fa fa-pen-nib' => 'fa-pen-nib', 'fa fa-pen-square' => 'fa-pen-square', 'fa fa-pencil-alt' => 'fa-pencil-alt', 'fa fa-pencil-ruler' => 'fa-pencil-ruler', 'fab fa-penny-arcade' => 'fa-penny-arcade', 'fa fa-people-arrows' => 'fa-people-arrows', 'fa fa-people-carry' => 'fa-people-carry', 'fa fa-pepper-hot' => 'fa-pepper-hot', 'fa fa-percent' => 'fa-percent', 'fa fa-percentage' => 'fa-percentage', 'fab fa-periscope' => 'fa-periscope', 'fa fa-person-booth' => 'fa-person-booth', 'fab fa-phabricator' => 'fa-phabricator', 'fab fa-phoenix-framework' => 'fa-phoenix-framework', 'fab fa-phoenix-squadron' => 'fa-phoenix-squadron', 'fa fa-phone' => 'fa-phone', 'fa fa-phone-alt' => 'fa-phone-alt', 'fa fa-phone-slash' => 'fa-phone-slash', 'fa fa-phone-square' => 'fa-phone-square', 'fa fa-phone-square-alt' => 'fa-phone-square-alt', 'fa fa-phone-volume' => 'fa-phone-volume', 'fa fa-photo-video' => 'fa-photo-video', 'fab fa-php' => 'fa-php', 'fab fa-pied-piper' => 'fa-pied-piper', 'fab fa-pied-piper-alt' => 'fa-pied-piper-alt', 'fab fa-pied-piper-hat' => 'fa-pied-piper-hat', 'fab fa-pied-piper-pp' => 'fa-pied-piper-pp', 'fa fa-pied-piper-square' => 'fa-pied-piper-square', 'fa fa-piggy-bank' => 'fa-piggy-bank', 'fa fa-pills' => 'fa-pills', 'fab fa-pinterest' => 'fa-pinterest', 'fab fa-pinterest-p' => 'fa-pinterest-p', 'fab fa-pinterest-square' => 'fa-pinterest-square', 'fa fa-pizza-slice' => 'fa-pizza-slice', 'fa fa-place-of-worship' => 'fa-place-of-worship', 'fa fa-plane' => 'fa-plane', 'fa fa-plane-arrival' => 'fa-plane-arrival', 'fa fa-plane-departure' => 'fa-plane-departure', 'fa fa-plane-slash' => 'fa-plane-slash', 'fa fa-play' => 'fa-play', 'fa fa-play-circle' => 'fa-play-circle', 'fab fa-playstation' => 'fa-playstation', 'fa fa-plug' => 'fa-plug', 'fa fa-plus' => 'fa-plus', 'fa fa-plus-circle' => 'fa-plus-circle', 'fa fa-plus-square' => 'fa-plus-square', 'fa fa-podcast' => 'fa-podcast', 'fa fa-poll' => 'fa-poll', 'fa fa-poll-h' => 'fa-poll-h', 'fa fa-poo' => 'fa-poo', 'fa fa-poo-storm' => 'fa-poo-storm', 'fa fa-poop' => 'fa-poop', 'fa fa-portrait' => 'fa-portrait', 'fa fa-pound-sign' => 'fa-pound-sign', 'fa fa-power-off' => 'fa-power-off', 'fa fa-pray' => 'fa-pray', 'fa fa-praying-hands' => 'fa-praying-hands', 'fa fa-prescription' => 'fa-prescription', 'fa fa-prescription-bottle' => 'fa-prescription-bottle', 'fa fa-prescription-bottle-alt' => 'fa-prescription-bottle-alt', 'fa fa-print' => 'fa-print', 'fa fa-procedures' => 'fa-procedures', 'fab fa-product-hunt' => 'fa-product-hunt', 'fa fa-project-diagram' => 'fa-project-diagram', 'fa fa-pump-medical' => 'fa-pump-medical', 'fa fa-pump-soap' => 'fa-pump-soap', 'fab fa-pushed' => 'fa-pushed', 'fa fa-puzzle-piece' => 'fa-puzzle-piece', 'fab fa-python' => 'fa-python', 'fab fa-qq' => 'fa-qq', 'fa fa-qrcode' => 'fa-qrcode', 'fa fa-question' => 'fa-question', 'fa fa-question-circle' => 'fa-question-circle', 'fa fa-quidditch' => 'fa-quidditch', 'fab fa-quinscape' => 'fa-quinscape', 'fab fa-quora' => 'fa-quora', 'fa fa-quote-left' => 'fa-quote-left', 'fa fa-quote-right' => 'fa-quote-right', 'fa fa-quran' => 'fa-quran', 'fab fa-r-project' => 'fa-r-project', 'fa fa-radiation' => 'fa-radiation', 'fa fa-radiation-alt' => 'fa-radiation-alt', 'fa fa-rainbow' => 'fa-rainbow', 'fa fa-random' => 'fa-random', 'fab fa-raspberry-pi' => 'fa-raspberry-pi', 'fab fa-ravelry' => 'fa-ravelry', 'fab fa-react' => 'fa-react', 'fab fa-reacteurope' => 'fa-reacteurope', 'fab fa-readme' => 'fa-readme', 'fab fa-rebel' => 'fa-rebel', 'fa fa-receipt' => 'fa-receipt', 'fa fa-record-vinyl' => 'fa-record-vinyl', 'fa fa-recycle' => 'fa-recycle', 'fab fa-red-river' => 'fa-red-river', 'fab fa-reddit' => 'fa-reddit', 'fab fa-reddit-alien' => 'fa-reddit-alien', 'fab fa-reddit-square' => 'fa-reddit-square', 'fab fa-redhat' => 'fa-redhat', 'fa fa-redo' => 'fa-redo', 'fa fa-redo-alt' => 'fa-redo-alt', 'fa fa-registered' => 'fa-registered', 'fa fa-remove-format' => 'fa-remove-format', 'fab fa-renren' => 'fa-renren', 'fa fa-reply' => 'fa-reply', 'fa fa-reply-all' => 'fa-reply-all', 'fab fa-replyd' => 'fa-replyd', 'fa fa-republican' => 'fa-republican', 'fab fa-researchgate' => 'fa-researchgate', 'fab fa-resolving' => 'fa-resolving', 'fa fa-restroom' => 'fa-restroom', 'fa fa-retweet' => 'fa-retweet', 'fab fa-rev' => 'fa-rev', 'fa fa-ribbon' => 'fa-ribbon', 'fa fa-ring' => 'fa-ring', 'fa fa-road' => 'fa-road', 'fa fa-robot' => 'fa-robot', 'fa fa-rocket' => 'fa-rocket', 'fab fa-rocketchat' => 'fa-rocketchat', 'fab fa-rockrms' => 'fa-rockrms', 'fa fa-route' => 'fa-route', 'fa fa-rss' => 'fa-rss', 'fa fa-rss-square' => 'fa-rss-square', 'fa fa-ruble-sign' => 'fa-ruble-sign', 'fa fa-ruler' => 'fa-ruler', 'fa fa-ruler-combined' => 'fa-ruler-combined', 'fa fa-ruler-horizontal' => 'fa-ruler-horizontal', 'fa fa-ruler-vertical' => 'fa-ruler-vertical', 'fa fa-running' => 'fa-running', 'fa fa-rupee-sign' => 'fa-rupee-sign', 'fa fa-sad-cry' => 'fa-sad-cry', 'fa fa-sad-tear' => 'fa-sad-tear', 'fab fa-safari' => 'fa-safari', 'fab fa-salesforce' => 'fa-salesforce', 'fab fa-sass' => 'fa-sass', 'fa fa-satellite' => 'fa-satellite', 'fa fa-satellite-dish' => 'fa-satellite-dish', 'fa fa-save' => 'fa-save', 'fab fa-schlix' => 'fa-schlix', 'fa fa-school' => 'fa-school', 'fa fa-screwdriver' => 'fa-screwdriver', 'fab fa-scribd' => 'fa-scribd', 'fa fa-scroll' => 'fa-scroll', 'fa fa-sd-card' => 'fa-sd-card', 'fa fa-search' => 'fa-search', 'fa fa-search-dollar' => 'fa-search-dollar', 'fa fa-search-location' => 'fa-search-location', 'fa fa-search-minus' => 'fa-search-minus', 'fa fa-search-plus' => 'fa-search-plus', 'fab fa-searchengin' => 'fa-searchengin', 'fa fa-seedling' => 'fa-seedling', 'fab fa-sellcast' => 'fa-sellcast', 'fab fa-sellsy' => 'fa-sellsy', 'fa fa-server' => 'fa-server', 'fab fa-servicestack' => 'fa-servicestack', 'fa fa-shapes' => 'fa-shapes', 'fa fa-share' => 'fa-share', 'fa fa-share-alt' => 'fa-share-alt', 'fa fa-share-alt-square' => 'fa-share-alt-square', 'fa fa-share-square' => 'fa-share-square', 'fa fa-shekel-sign' => 'fa-shekel-sign', 'fa fa-shield-alt' => 'fa-shield-alt', 'fa fa-shield-virus' => 'fa-shield-virus', 'fa fa-ship' => 'fa-ship', 'fa fa-shipping-fast' => 'fa-shipping-fast', 'fab fa-shirtsinbulk' => 'fa-shirtsinbulk', 'fa fa-shoe-prints' => 'fa-shoe-prints', 'fa fa-shopify' => 'fa-shopify', 'fa fa-shopping-bag' => 'fa-shopping-bag', 'fa fa-shopping-basket' => 'fa-shopping-basket', 'fa fa-shopping-cart' => 'fa-shopping-cart', 'fab fa-shopware' => 'fa-shopware', 'fa fa-shower' => 'fa-shower', 'fa fa-shuttle-van' => 'fa-shuttle-van', 'fa fa-sign' => 'fa-sign', 'fa fa-sign-in-alt' => 'fa-sign-in-alt', 'fa fa-sign-language' => 'fa-sign-language', 'fa fa-sign-out-alt' => 'fa-sign-out-alt', 'fa fa-signal' => 'fa-signal', 'fa fa-signature' => 'fa-signature', 'fa fa-sim-card' => 'fa-sim-card', 'fab fa-simplybuilt' => 'fa-simplybuilt', 'fab fa-sistrix' => 'fa-sistrix', 'fa fa-sitemap' => 'fa-sitemap', 'fab fa-sith' => 'fa-sith', 'fa fa-skating' => 'fa-skating', 'fab fa-sketch' => 'fa-sketch', 'fa fa-skiing' => 'fa-skiing', 'fa fa-skiing-nordic' => 'fa-skiing-nordic', 'fa fa-skull' => 'fa-skull', 'fa fa-skull-crossbones' => 'fa-skull-crossbones', 'fab fa-skyatlas' => 'fa-skyatlas', 'fab fa-skype' => 'fa-skype', 'fab fa-slack' => 'fa-slack', 'fab fa-slack-hash' => 'fa-slack-hash', 'fa fa-slash' => 'fa-slash', 'fa fa-sleigh' => 'fa-sleigh', 'fa fa-sliders-h' => 'fa-sliders-h', 'fab fa-slideshare' => 'fa-slideshare', 'fa fa-smile' => 'fa-smile', 'fa fa-smile-beam' => 'fa-smile-beam', 'fa fa-smile-wink' => 'fa-smile-wink', 'fa fa-smog' => 'fa-smog', 'fa fa-smoking' => 'fa-smoking', 'fa fa-smoking-ban' => 'fa-smoking-ban', 'fa fa-sms' => 'fa-sms', 'fab fa-snapchat' => 'fa-snapchat', 'fab fa-snapchat-ghost' => 'fa-snapchat-ghost', 'fab fa-snapchat-square' => 'fa-snapchat-square', 'fa fa-snowboarding' => 'fa-snowboarding', 'fa fa-snowflake' => 'fa-snowflake', 'fa fa-snowman' => 'fa-snowman', 'fa fa-snowplow' => 'fa-snowplow', 'fa fa-soap' => 'fa-soap', 'fa fa-socks' => 'fa-socks', 'fa fa-solar-panel' => 'fa-solar-panel', 'fa fa-sort' => 'fa-sort', 'fa fa-sort-alpha-down' => 'fa-sort-alpha-down', 'fa fa-sort-alpha-down-alt' => 'fa-sort-alpha-down-alt', 'fa fa-sort-alpha-up' => 'fa-sort-alpha-up', 'fa fa-sort-alpha-up-alt' => 'fa-sort-alpha-up-alt', 'fa fa-sort-amount-down' => 'fa-sort-amount-down', 'fa fa-sort-amount-down-alt' => 'fa-sort-amount-down-alt', 'fa fa-sort-amount-up' => 'fa-sort-amount-up', 'fa fa-sort-amount-up-alt' => 'fa-sort-amount-up-alt', 'fa fa-sort-down' => 'fa-sort-down', 'fa fa-sort-numeric-down' => 'fa-sort-numeric-down', 'fa fa-sort-numeric-down-alt' => 'fa-sort-numeric-down-alt', 'fa fa-sort-numeric-up' => 'fa-sort-numeric-up', 'fa fa-sort-numeric-up-alt' => 'fa-sort-numeric-up-alt', 'fa fa-sort-up' => 'fa-sort-up', 'fab fa-soundcloud' => 'fa-soundcloud', 'fab fa-sourcetree' => 'fa-sourcetree', 'fa fa-spa' => 'fa-spa', 'fa fa-space-shuttle' => 'fa-space-shuttle', 'fab fa-speakap' => 'fa-speakap', 'fab fa-speaker-deck' => 'fa-speaker-deck', 'fa fa-spell-check' => 'fa-spell-check', 'fa fa-spider' => 'fa-spider', 'fa fa-spinner' => 'fa-spinner', 'fa fa-splotch' => 'fa-splotch', 'fab fa-spotify' => 'fa-spotify', 'fa fa-spray-can' => 'fa-spray-can', 'fa fa-square' => 'fa-square', 'fa fa-square-full' => 'fa-square-full', 'fa fa-square-root-alt' => 'fa-square-root-alt', 'fab fa-squarespace' => 'fa-squarespace', 'fab fa-stack-exchange' => 'fa-stack-exchange', 'fab fa-stack-overflow' => 'fa-stack-overflow', 'fab fa-stackpath' => 'fa-stackpath', 'fa fa-stamp' => 'fa-stamp', 'fa fa-star' => 'fa-star', 'fa fa-star-and-crescent' => 'fa-star-and-crescent', 'fa fa-star-half' => 'fa-star-half', 'fa fa-star-half-alt' => 'fa-star-half-alt', 'fa fa-star-of-david' => 'fa-star-of-david', 'fa fa-star-of-life' => 'fa-star-of-life', 'fab fa-staylinked' => 'fa-staylinked', 'fab fa-steam' => 'fa-steam', 'fab fa-steam-square' => 'fa-steam-square', 'fab fa-steam-symbol' => 'fa-steam-symbol', 'fa fa-step-backward' => 'fa-step-backward', 'fa fa-step-forward' => 'fa-step-forward', 'fa fa-stethoscope' => 'fa-stethoscope', 'fab fa-sticker-mule' => 'fa-sticker-mule', 'fa fa-sticky-note' => 'fa-sticky-note', 'fa fa-stop' => 'fa-stop', 'fa fa-stop-circle' => 'fa-stop-circle', 'fa fa-stopwatch' => 'fa-stopwatch', 'fa fa-stopwatch-20' => 'fa-stopwatch-20', 'fa fa-store' => 'fa-store', 'fa fa-store-alt' => 'fa-store-alt', 'fa fa-store-alt-slash' => 'fa-store-alt-slash', 'fa fa-store-slash' => 'fa-store-slash', 'fab fa-strava' => 'fa-strava', 'fa fa-stream' => 'fa-stream', 'fa fa-street-view' => 'fa-street-view', 'fa fa-strikethrough' => 'fa-strikethrough', 'fab fa-stripe' => 'fa-stripe', 'fab fa-stripe-s' => 'fa-stripe-s', 'fa fa-stroopwafel' => 'fa-stroopwafel', 'fab fa-studiovinari' => 'fa-studiovinari', 'fab fa-stumbleupon' => 'fa-stumbleupon', 'fab fa-stumbleupon-circle' => 'fa-stumbleupon-circle', 'fa fa-subscript' => 'fa-subscript', 'fa fa-subway' => 'fa-subway', 'fa fa-suitcase' => 'fa-suitcase', 'fa fa-suitcase-rolling' => 'fa-suitcase-rolling', 'fa fa-sun' => 'fa-sun', 'fab fa-superpowers' => 'fa-superpowers', 'fa fa-superscript' => 'fa-superscript', 'fab fa-supple' => 'fa-supple', 'fa fa-surprise' => 'fa-surprise', 'fab fa-suse' => 'fa-suse', 'fa fa-swatchbook' => 'fa-swatchbook', 'fab fa-swift' => 'fa-swift', 'fa fa-swimmer' => 'fa-swimmer', 'fa fa-swimming-pool' => 'fa-swimming-pool', 'fab fa-symfony' => 'fa-symfony', 'fa fa-synagogue' => 'fa-synagogue', 'fa fa-sync' => 'fa-sync', 'fa fa-sync-alt' => 'fa-sync-alt', 'fa fa-syringe' => 'fa-syringe', 'fa fa-table' => 'fa-table', 'fa fa-table-tennis' => 'fa-table-tennis', 'fa fa-tablet' => 'fa-tablet', 'fa fa-tablet-alt' => 'fa-tablet-alt', 'fa fa-tablets' => 'fa-tablets', 'fa fa-tachometer-alt' => 'fa-tachometer-alt', 'fa fa-tag' => 'fa-tag', 'fa fa-tags' => 'fa-tags', 'fa fa-tape' => 'fa-tape', 'fa fa-tasks' => 'fa-tasks', 'fa fa-taxi' => 'fa-taxi', 'fab fa-teamspeak' => 'fa-teamspeak', 'fa fa-teeth' => 'fa-teeth', 'fa fa-teeth-open' => 'fa-teeth-open', 'fab fa-telegram' => 'fa-telegram', 'fab fa-telegram-plane' => 'fa-telegram-plane', 'fa fa-temperature-high' => 'fa-temperature-high', 'fa fa-temperature-low' => 'fa-temperature-low', 'fab fa-tencent-weibo' => 'fa-tencent-weibo', 'fa fa-tenge' => 'fa-tenge', 'fa fa-terminal' => 'fa-terminal', 'fa fa-text-height' => 'fa-text-height', 'fa fa-text-width' => 'fa-text-width', 'fa fa-th' => 'fa-th', 'fa fa-th-large' => 'fa-th-large', 'fa fa-th-list' => 'fa-th-list', 'fab fa-the-red-yeti' => 'fa-the-red-yeti', 'fa fa-theater-masks' => 'fa-theater-masks', 'fab fa-themeco' => 'fa-themeco', 'fab fa-themeisle' => 'fa-themeisle', 'fa fa-thermometer' => 'fa-thermometer', 'fa fa-thermometer-empty' => 'fa-thermometer-empty', 'fa fa-thermometer-full' => 'fa-thermometer-full', 'fa fa-thermometer-half' => 'fa-thermometer-half', 'fa fa-thermometer-quarter' => 'fa-thermometer-quarter', 'fa fa-thermometer-three-quarters' => 'fa-thermometer-three-quarters', 'fab fa-think-peaks' => 'fa-think-peaks', 'fa fa-thumbs-down' => 'fa-thumbs-down', 'fa fa-thumbs-up' => 'fa-thumbs-up', 'fa fa-thumbtack' => 'fa-thumbtack', 'fa fa-ticket-alt' => 'fa-ticket-alt', 'fa fa-times' => 'fa-times', 'fa fa-times-circle' => 'fa-times-circle', 'fa fa-tint' => 'fa-tint', 'fa fa-tint-slash' => 'fa-tint-slash', 'fa fa-tired' => 'fa-tired', 'fa fa-toggle-off' => 'fa-toggle-off', 'fa fa-toggle-on' => 'fa-toggle-on', 'fa fa-toilet' => 'fa-toilet', 'fa fa-toilet-paper' => 'fa-toilet-paper', 'fa fa-toilet-paper-slash' => 'fa-toilet-paper-slash', 'fa fa-toolbox' => 'fa-toolbox', 'fa fa-tools' => 'fa-tools', 'fa fa-tooth' => 'fa-tooth', 'fa fa-torah' => 'fa-torah', 'fa fa-torii-gate' => 'fa-torii-gate', 'fa fa-tractor' => 'fa-tractor', 'fab fa-trade-federation' => 'fa-trade-federation', 'fa fa-trademark' => 'fa-trademark', 'fa fa-traffic-light' => 'fa-traffic-light', 'fa fa-trailer' => 'fa-trailer', 'fa fa-train' => 'fa-train', 'fa fa-tram' => 'fa-tram', 'fa fa-transgender' => 'fa-transgender', 'fa fa-transgender-alt' => 'fa-transgender-alt', 'fa fa-trash' => 'fa-trash', 'fa fa-trash-alt' => 'fa-trash-alt', 'fa fa-trash-restore' => 'fa-trash-restore', 'fa fa-trash-restore-alt' => 'fa-trash-restore-alt', 'fa fa-tree' => 'fa-tree', 'fab fa-trello' => 'fa-trello', 'fab fa-tripadvisor' => 'fa-tripadvisor', 'fa fa-trophy' => 'fa-trophy', 'fa fa-truck' => 'fa-truck', 'fa fa-truck-loading' => 'fa-truck-loading', 'fa fa-truck-monster' => 'fa-truck-monster', 'fa fa-truck-moving' => 'fa-truck-moving', 'fa fa-truck-pickup' => 'fa-truck-pickup', 'fa fa-tshirt' => 'fa-tshirt', 'fa fa-tty' => 'fa-tty', 'fab fa-tumblr' => 'fa-tumblr', 'fab fa-tumblr-square' => 'fa-tumblr-square', 'fa fa-tv' => 'fa-tv', 'fab fa-twitch' => 'fa-twitch', 'fab fa-twitter' => 'fa-twitter', 'fab fa-twitter-square' => 'fa-twitter-square', 'fab fa-typo3' => 'fa-typo3', 'fab fa-uber' => 'fa-uber', 'fab fa-ubuntu' => 'fa-ubuntu', 'fab fa-uikit' => 'fa-uikit', 'fab fa-umbraco' => 'fa-umbraco', 'fa fa-umbrella' => 'fa-umbrella', 'fa fa-umbrella-beach' => 'fa-umbrella-beach', 'fa fa-underline' => 'fa-underline', 'fa fa-undo' => 'fa-undo', 'fa fa-undo-alt' => 'fa-undo-alt', 'fab fa-uniregistry' => 'fa-uniregistry', 'fa fa-unity' => 'fa-unity', 'fa fa-universal-access' => 'fa-universal-access', 'fa fa-university' => 'fa-university', 'fa fa-unlink' => 'fa-unlink', 'fa fa-unlock' => 'fa-unlock', 'fa fa-unlock-alt' => 'fa-unlock-alt', 'fab fa-untappd' => 'fa-untappd', 'fa fa-upload' => 'fa-upload', 'fab fa-ups' => 'fa-ups', 'fab fa-usb' => 'fa-usb', 'fa fa-user' => 'fa-user', 'fa fa-user-alt' => 'fa-user-alt', 'fa fa-user-alt-slash' => 'fa-user-alt-slash', 'fa fa-user-astronaut' => 'fa-user-astronaut', 'fa fa-user-check' => 'fa-user-check', 'fa fa-user-circle' => 'fa-user-circle', 'fa fa-user-clock' => 'fa-user-clock', 'fa fa-user-cog' => 'fa-user-cog', 'fa fa-user-edit' => 'fa-user-edit', 'fa fa-user-friends' => 'fa-user-friends', 'fa fa-user-graduate' => 'fa-user-graduate', 'fa fa-user-injured' => 'fa-user-injured', 'fa fa-user-lock' => 'fa-user-lock', 'fa fa-user-md' => 'fa-user-md', 'fa fa-user-minus' => 'fa-user-minus', 'fa fa-user-ninja' => 'fa-user-ninja', 'fa fa-user-nurse' => 'fa-user-nurse', 'fa fa-user-plus' => 'fa-user-plus', 'fa fa-user-secret' => 'fa-user-secret', 'fa fa-user-shield' => 'fa-user-shield', 'fa fa-user-slash' => 'fa-user-slash', 'fa fa-user-tag' => 'fa-user-tag', 'fa fa-user-tie' => 'fa-user-tie', 'fa fa-user-times' => 'fa-user-times', 'fa fa-users' => 'fa-users', 'fa fa-users-cog' => 'fa-users-cog', 'fab fa-usps' => 'fa-usps', 'fab fa-ussunnah' => 'fa-ussunnah', 'fa fa-utensil-spoon' => 'fa-utensil-spoon', 'fa fa-utensils' => 'fa-utensils', 'fab fa-vaadin' => 'fa-vaadin', 'fa fa-vector-square' => 'fa-vector-square', 'fa fa-venus' => 'fa-venus', 'fa fa-venus-double' => 'fa-venus-double', 'fa fa-venus-mars' => 'fa-venus-mars', 'fab fa-viacoin' => 'fa-viacoin', 'fab fa-viadeo' => 'fa-viadeo', 'fab fa-viadeo-square' => 'fa-viadeo-square', 'fa fa-vial' => 'fa-vial', 'fa fa-vials' => 'fa-vials', 'fab fa-viber' => 'fa-viber', 'fa fa-video' => 'fa-video', 'fa fa-video-slash' => 'fa-video-slash', 'fa fa-vihara' => 'fa-vihara', 'fab fa-vimeo' => 'fa-vimeo', 'fab fa-vimeo-square' => 'fa-vimeo-square', 'fab fa-vimeo-v' => 'fa-vimeo-v', 'fab fa-vine' => 'fa-vine', 'fa fa-virus' => 'fa-virus', 'fa fa-virus-slash' => 'fa-virus-slash', 'fa fa-viruses' => 'fa-viruses', 'fab fa-vk' => 'fa-vk', 'fab fa-vnv' => 'fa-vnv', 'fa fa-voicemail' => 'fa-voicemail', 'fa fa-volleyball-ball' => 'fa-volleyball-ball', 'fa fa-volume-down' => 'fa-volume-down', 'fa fa-volume-mute' => 'fa-volume-mute', 'fa fa-volume-off' => 'fa-volume-off', 'fa fa-volume-up' => 'fa-volume-up', 'fa fa-vote-yea' => 'fa-vote-yea', 'fa fa-vr-cardboard' => 'fa-vr-cardboard', 'fab fa-vuejs' => 'fa-vuejs', 'fa fa-walking' => 'fa-walking', 'fa fa-wallet' => 'fa-wallet', 'fa fa-warehouse' => 'fa-warehouse', 'fa fa-water' => 'fa-water', 'fa fa-wave-square' => 'fa-wave-square', 'fab fa-waze' => 'fa-waze', 'fab fa-weebly' => 'fa-weebly', 'fab fa-weibo' => 'fa-weibo', 'fa fa-weight' => 'fa-weight', 'fa fa-weight-hanging' => 'fa-weight-hanging', 'fab fa-weixin' => 'fa-weixin', 'fab fa-whatsapp' => 'fa-whatsapp', 'fab fa-whatsapp-square' => 'fa-whatsapp-square', 'fa fa-wheelchair' => 'fa-wheelchair', 'fab fa-whmcs' => 'fa-whmcs', 'fa fa-wifi' => 'fa-wifi', 'fab fa-wikipedia-w' => 'fa-wikipedia-w', 'fa fa-wind' => 'fa-wind', 'fa fa-window-close' => 'fa-window-close', 'fa fa-window-maximize' => 'fa-window-maximize', 'fa fa-window-minimize' => 'fa-window-minimize', 'fa fa-window-restore' => 'fa-window-restore', 'fab fa-windows' => 'fa-windows', 'fa fa-wine-bottle' => 'fa-wine-bottle', 'fa fa-wine-glass' => 'fa-wine-glass', 'fa fa-wine-glass-alt' => 'fa-wine-glass-alt', 'fab fa-wix' => 'fa-wix', 'fab fa-wizards-of-the-coast' => 'fa-wizards-of-the-coast', 'fab fa-wolf-pack-battalion' => 'fa-wolf-pack-battalion', 'fa fa-won-sign' => 'fa-won-sign', 'fab fa-wordpress' => 'fa-wordpress', 'fab fa-wordpress-simple' => 'fa-wordpress-simple', 'fab fa-wpbeginner' => 'fa-wpbeginner', 'fab fa-wpexplorer' => 'fa-wpexplorer', 'fab fa-wpforms' => 'fa-wpforms', 'fab fa-wpressr' => 'fa-wpressr', 'fa fa-wrench' => 'fa-wrench', 'fa fa-x-ray' => 'fa-x-ray', 'fab fa-xbox' => 'fa-xbox', 'fab fa-xing' => 'fa-xing', 'fab fa-xing-square' => 'fa-xing-square', 'fab fa-y-combinator' => 'fa-y-combinator', 'fab fa-yahoo' => 'fa-yahoo', 'fab fa-yammer' => 'fa-yammer', 'fab fa-yandex' => 'fa-yandex', 'fab fa-yandex-international' => 'fa-yandex-international', 'fab fa-yarn' => 'fa-yarn', 'fab fa-yelp' => 'fa-yelp', 'fa fa-yen-sign' => 'fa-yen-sign', 'fa fa-yin-yang' => 'fa-yin-yang', 'fab fa-yoast' => 'fa-yoast', 'fab fa-youtube' => 'fa-youtube', 'fab fa-youtube-square' => 'fa-youtube-square', 'fab fa-zhihu' => 'fa-zhihu'];

$select_level = ArrayHelper::map(UserLevel::find()->asArray()->all(), function($model, $defaultValue) {

    return md5($model['code']);

}, function($model, $defaultValue) {

        return sprintf('%s - %s', $model['type'], $model['name']);
    }
);

$select_menu = array(0 => 'NONE') + ArrayHelper::map(UserMenu::find()->asArray()->all(),'id', function($model, $defaultValue) {

        return sprintf('%s (%s)', $model['name'], $model['class']);
    }
);

/* ------------------------------------------------------------------- BACKEND CONTROLLERS ------------------------------------------------------------------- */

$backend_fulllist = [];
$backend_fulllist2 = [];
$backend_controllerlist = [];

if ($backend_handle = opendir(Yii::getAlias('@backend/controllers')))
{
    while (false !== ($backend_file = readdir($backend_handle))) 
    {
        if ($backend_file != "." && $backend_file != ".." && substr($backend_file, strrpos($backend_file, '.') - 10) == 'Controller.php') 
        {
            $backend_controllerlist[] = $backend_file;
        }
    }

    closedir($backend_handle);
}

asort($backend_controllerlist);

foreach ($backend_controllerlist as $backend_controller)
{
    $backend_handle = fopen(Yii::getAlias('@backend/controllers') . '/' . $backend_controller, "r");

    if ($backend_handle) 
    {
        while (($backend_line = fgets($backend_handle)) !== false) 
        {
            if (preg_match('/public function action(.*?)\(/', $backend_line, $backend_action))
            {
                if (strlen($backend_action[1]) > 2)
                {
                    $backend_controller_fix = preg_replace('/Controller.php/', '', $backend_controller);
                    $backend_controller_divide = preg_split('/(?=[A-Z])/', $backend_controller_fix, -1, PREG_SPLIT_NO_EMPTY);
                    $backend_controller_lowletter = strtolower(implode('-', $backend_controller_divide));
                    $backend_action_divide = preg_split('/(?=[A-Z])/', trim($backend_action[1]), -1, PREG_SPLIT_NO_EMPTY);
                    $backend_action_lowletter = strtolower(implode('-', $backend_action_divide));
                    $backend_fulllist[] = ['key' => $backend_controller_lowletter, 'val' => $backend_action_lowletter];
                    $backend_fulllist2[$backend_controller_lowletter][] = $backend_action_lowletter;
                }
            }
        }
    }

    fclose($backend_handle);
}

/* ------------------------------------------------------------------- FRONTEND CONTROLLERS ------------------------------------------------------------------- */

$frontend_fulllist = [];
$frontend_fulllist2 = [];
$frontend_controllerlist = [];

if ($frontend_handle = opendir(Yii::getAlias('@frontend/controllers')))
{
    while (false !== ($frontend_file = readdir($frontend_handle))) 
    {
        if ($frontend_file != "." && $frontend_file != ".." && substr($frontend_file, strrpos($frontend_file, '.') - 10) == 'Controller.php') 
        {
            $frontend_controllerlist[] = $frontend_file;
        }
    }

    closedir($frontend_handle);
}

asort($frontend_controllerlist);

foreach ($frontend_controllerlist as $frontend_controller)
{
    $frontend_handle = fopen(Yii::getAlias('@frontend/controllers') . '/' . $frontend_controller, "r");

    if ($frontend_handle) 
    {
        while (($frontend_line = fgets($frontend_handle)) !== false) 
        {
            if (preg_match('/public function action(.*?)\(/', $frontend_line, $frontend_action))
            {
                if (strlen($frontend_action[1]) > 2)
                {
                    $frontend_controller_fix = preg_replace('/Controller.php/', '', $frontend_controller);
                    $frontend_controller_divide = preg_split('/(?=[A-Z])/', $frontend_controller_fix, -1, PREG_SPLIT_NO_EMPTY);
                    $frontend_controller_lowletter = strtolower(implode('-', $frontend_controller_divide));
                    $frontend_action_divide = preg_split('/(?=[A-Z])/', trim($frontend_action[1]), -1, PREG_SPLIT_NO_EMPTY);
                    $frontend_action_lowletter = strtolower(implode('-', $frontend_action_divide));
                    $frontend_fulllist[] = ['key' => $frontend_controller_lowletter, 'val' => $frontend_action_lowletter];
                    $frontend_fulllist2[$frontend_controller_lowletter][] = $frontend_action_lowletter;
                }
            }
        }
    }

    fclose($frontend_handle);
}


?>

<div class="user-menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-lg-3">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_sub')->widget(Select2::classname(),[
                    'data' => $select_menu,
                    'options' => [
                        'placeholder' => 'Pilih Menu Level 2',
                        'value' => $model->isNewRecord ? 0 : $model->id_sub,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'id_sub2')->widget(Select2::classname(),[
                    'data' => $select_menu,
                    'options' => [
                        'placeholder' => 'Pilih Menu Level 2',
                        'value' => $model->isNewRecord ? 0 : $model->id_sub2,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>

        <div class="col-lg-3">

            <?= $form->field($model, 'level')->widget(Select2::classname(),[
                    'data' => $select_level,
                    'options' => [
                        'placeholder' => 'User Level',
                        'value' => $model->isNewRecord ? Yii::$app->user->identity->level : $model->level,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'module')->widget(Select2::classname(),[
                    'data' => ['app-backend-webapps' => 'app-backend-webapps', 'app-frontend-webapps' => 'app-frontend-webapps'] ,
                    'options' => [
                        'placeholder' => 'Pilih Module',
                        'value' => $model->isNewRecord ? 'app-backend-webapps' : $model->module,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

            <?= $form->field($model, 'class')->widget(Select2::classname(),[
                    'data' => [ 'L' => 'LINK', 'S' => 'SUB MENU', 'H' => 'HEADER', 'D' => 'DIVIDER' ],
                    'options' => [
                        'placeholder' => 'Pilih Class',
                        'value' => $model->isNewRecord ? 'L' : $model->class,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false
                    ],
                ]);
            ?>

        </div>    

        <div class="col-lg-3">

            <?= $form->field($model, 'url_controller')->widget(Select2::classname(),[
                    'data' => ArrayHelper::map($backend_fulllist, 'key', 'key'),
                    'options' => [
                        'placeholder' => 'Pilih Controller',
                        'value' => $model->isNewRecord ? 'L' : $model->url_controller,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'url_view')->widget(Select2::classname(),[
                    'data' => $model->isNewRecord ? null : [$model->url_view => $model->url_view],
                    'options' => [
                        'placeholder' => 'Pilih View',
                        'value' => $model->isNewRecord ? null : $model->url_view,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'url_parameter')->textInput(['maxlength' => true]) ?>

        </div>    

        <div class="col-lg-3">

            <?= $form->field($model, 'seq')->textInput(['type' => 'number', 'min' => 0, 'value' => $model->isNewRecord ? 0 : $model->seq]) ?>

            <?= $form->field($model, 'icon')->widget(Select2::classname(),[
                    'data' => $fontawesome,
                    'options' => [
                        'placeholder' => 'Pilih Icon',
                    ],
                    'pluginOptions' => [
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function formatState (state) {
								console.log(state);
								if (!state.id) {
									return state.text;
								}
								var state = $(\'<i class="\' + state.id + \'"></i>\' + \' <span>(\' + state.text + \')</span>\');
								return state;
							}'
						),
						'templateSelection' => new JsExpression('function formatState (state) {
								if (!state.id) {
									return state.text;
								}
								var state = $(\'<i class="\' + state.id + \'"></i>\' + \' <span>(\' + state.text + \')</span>\');
								return state;
	                        }'
	                    ),
                        'allowClear' => false
                    ],
                ]);
            ?>
            
        </div>    

    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="form-group">

                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

            </div>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$list_search   = json_encode($backend_fulllist2);
$list_search2  = json_encode($frontend_fulllist2);
$list_backend  = json_encode(ArrayHelper::map($backend_fulllist, 'key', 'key'));
$list_frontend = json_encode(ArrayHelper::map($frontend_fulllist, 'key', 'key'));

$js = <<< JS

$('#usermenu-module').on('change', function(e) {
	var data = '$list_backend';
	if (this.value === 'app-frontend-webapps') data = '$list_frontend';
	what = JSON.parse(data);
	html = '<option></option>';
	$.each(what, function(i, val) {
		html+= '<option value="' + val.toString().toLowerCase() + '">' + val.toString().toLowerCase() + '</option>';
	});
	$("#usermenu-url_controller").html(html);
	$("#usermenu-url_view").html(null);
});

$('#usermenu-url_controller').on('change', function(e) {
	var data = '$list_search';
	if ($('#usermenu-module').val() === 'app-frontend-webapps') data = '$list_search2';
	var value = this.value;
	what = JSON.parse(data);
	html = '<option></option>';
	$.each(what[value], function(i, val) {
		html+= '<option value="' + val.toString().toLowerCase() + '">' + val.toString().toLowerCase() + '</option>';
	});
	$("#usermenu-url_view").html(html);
});

JS;

$css = <<< CSS

CSS;

$this->registerJs($js);
$this->registerCss($css);
