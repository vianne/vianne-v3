function importJS() {
    if (!new Array().push) return false;
    var commonPath = '/js/';
    var scripts = new Array(
        commonPath + 'jquery-1.10.2.min.js',
        commonPath + 'ga.js',
        commonPath + 'DD_belatedPNG_0.0.8a-min.js', // IE6で24bitPNGを有効に
        commonPath + 'jquery.scrollTo-min.js', // スムーズスクロール用
        commonPath + 'localscroll.js',  // スムーズスクロール用（scrollToとセット）
        commonPath + 'if.useragent.js', // UA判別
        //commonPath + 'jquery.cookie.js', // cookie用
        commonPath + 'screen.js'
    );
    for (var i = 0; i < scripts.length; i++) {
        document.write('<script src="' + scripts[i] + '"><\/script>');
    }
}
importJS();