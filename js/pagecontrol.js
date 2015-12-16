/* 页面锚点控制 */
var to = function(anchorid){
    var win = $('html,body');
    if(win.is(':animated'))return;
    win.animate({'scrollTop':$('#'+anchorid).position().top},500);
};
window.scrollToTop = function(){
    var win = $('html,body');
    if(win.is(':animated'))return;
    win.animate({'scrollTop':0},500);
};

window.scrollToTopPos = function(pos){
    var win = $('html,body');
    if(win.is(':animated'))return;
    win.animate({'scrollTop':pos},500);
};