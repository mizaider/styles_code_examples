// var $menu = $(".middle-menu-list");

// $menu.menuAim({
//   activate: activateSubmenu,
//   deactivate: deactivateSubmenu
// });

// function activateSubmenu(row) {
//   var $row = $(row),
//     submenuId = $row.data("submenuId"),
//     $submenu = $("#" + submenuId),
//     height = $menu.outerHeight(),
//     width = $menu.outerWidth();

//   // Show the submenu
//   $submenu.css({
//     display: "block",
//     top: -1,
//     left: width - 3,  // main should overlay submenu
//     height: height - 4  // padding for main dropdown's arrow
//   });

//   // Keep the currently activated row's highlighted look
//   // $row.find("a").addClass("maintainHover");
// }

// function deactivateSubmenu(row) {
//   var $row = $(row),
//     submenuId = $row.data("submenuId"),
//     $submenu = $("#" + submenuId);

//   // Hide the submenu and remove the row's highlighted look
//   $submenu.css("display", "none");
//   $row.find("a").removeClass("maintainHover");
// }

// $( ".middle-menu-list" ).menuAim({
//   activate: function() {
//     $(".have-child-menu").mouseover(function(){
//   $(this).find(".sub-menu").css("display", "block");
// });
//   },
//   deactivate: function() {
//     $(".sub-menu").mouseout(function(){
//   $(this).css("display", "none");
// });
//   },
//   // rowSelector: "> .have-child-menu",
//   // submenuSelector: ".sub-menu",
//  });

// $('.middle-menu-list .have-child-menu').hover(function() {
//         $(this).find('.sub-menu').show();
//     },
//     function() {
//       $(this).find('.sub-menu').hide();
// });

// $(".have-child-menu").mouseover(function(){
//   $(this).find(".sub-menu").show();
// });

// $(".sub-menu").mouseout(function(){
//   $(this).hide();
// });

// $(".middle-menu-list").menuAim({
//     rowSelector: "li.have-child-menu",
//     submenuSelector: ".sub-menu",
//     submenuDirection: "below",
//     tolerance: 0,
//     activate: function(a){
//         $(a).children('.sub-menu').show();
//     },
//     deactivate: function(a){
//         $(a).children('.sub-menu').hide();
//     }
// });