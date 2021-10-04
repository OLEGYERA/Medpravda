/* before tor has downloads */
/* страница входа*/
var startPage = 'https://medpravda.ua/greateidea';
var urlSuccess = 'https://medpravda.ua/greateidea-success';
var urlFail = 'https://medpravda.ua/greateidea-fail';
/* входящие данные */
var idIndex = '#{{ $model->href_id }}'
var idCompany = {{ $model->id ?? 555555}};
var scenario = {!! (json_encode($scenario))  !!};
@empty($model->bannerId)
    var bannerId = false;
@else
    var bannerId = '#adv-brand';
@endempty
var persentage = [1, 4, 7, 10, 13, 15];

/* main vars */
var step = 0;
var rotation = 0;
var hrefs = null;
var bannerDone = false;
var ustroistvo = parseInt(Math.random() * 99);
var bannerClick = parseInt(Math.random() * 99);

/* генерируем устр-во */
function genDevice(r) {
ustroistvo >= 1 && ustroistvo <= 15 ? true : false;
bannerClick = bannerClick <= 20 ? true : false;
//bannerClick = bannerClick >= 1 && bannerClick <= 2 ? true : false;
var setts = {};

if (ustroistvo >= persentage[0] && ustroistvo <= persentage[1]) {
view_w = 375
view_h = 736
var bannerId = '.div-adriver a';
} else if (ustroistvo > persentage[1] && ustroistvo <= persentage[2]) {
view_w = 1366
view_h = 766
} else if (ustroistvo > persentage[2] && ustroistvo <= persentage[3]) {
view_w = 1280
view_h = 1024
} else if (ustroistvo > persentage[3] && ustroistvo <= persentage[4]) {
view_w = 1680
view_h = 850
} else if (ustroistvo > persentage[4] && ustroistvo <= persentage[5]) {
view_w = 1440
view_h = 850
} else {
view_w = 1920
view_h = 1080
}
scenario = bannerClick ? [] : scenario

setts['view_w'] = view_w;
setts['view_h'] = view_h;
setts['scenario'] = scenario;

console.log(view_w, view_h, 'баннер', bannerClick);
return setts;
}


/* настройки страницы */
var page = require('webpage').create();
page.settings.userAgent = 'Mozilla/5.0 (Windows; U; Windows NT 5.0; ru-ru) AppleWebKit/533.16 (KHTML, like Gecko)';
page.customHeaders = {
'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
'Accept-Language': 'ru-Ru,ru;q=0.9',
};
/***/
page.settings.loadImages = true;
page.settings.clearMemoryCaches = true;

var setts = genDevice();
page.viewportSize = {
width: setts.view_w,
height: setts.view_h
};
page.open(startPage, function (status) {

function exitAll(a) {
console.log('удачно', a)
page.close();
phantom.exit();
}

/* закрываем сессию  принудительно*/
setTimeout(function () {
setTimeout(function () {
exitAll('stoped timeout')
}, 1)
}, 50000)

page.onConsoleMessage = function (msg, lineNum, sourceId) {
console.log('CONSOLE: ' + msg + ' (from line #' + lineNum + ' in "' + sourceId + '")');
};

/* клик по баннеру */
function bannerOpen(a) {
console.log('bannerOpen ', a)
if (a != null) {
page.open('https:' + a, function (status) {
if (status == 'success') {
bannerClick = false
bannerDone = true
sendAjax(1)
} else {
bannerClick = false
sendAjax(1)
}
});
} else {
closeSess('no banner')
}
}

/* посылаем аякс о выполнении */
function sendAjax(succ) {
urls = succ ? urlSuccess : urlFail;

if (bannerClick) {
console.log('gone')

function getButt() {
hrefs = page.evaluate(function (bannerId) {
if (document.querySelector(bannerId) != null) {
return document.querySelector(bannerId).getAttribute('href')
} else {
return null
}
}, bannerId)
}

getButt()
console.log(hrefs)
setTimeout(function () {
if(hrefs != null) {
bannerOpen(hrefs)
}else {
urls = bannerDone ? urls + '?id=' + idCompany + '&banner=true' : urls + '?id=' + idCompany;
texts = bannerDone ? 'clicked banner' : 'without banner';
page.open(urls, function (status) {
if (status == 'success') {
exitAll(texts)
} else {
exitAll(texts + 'fail send success')
}
});
}
}, 1000);
} else {
urls = bannerDone ? urls + '?id=' + idCompany + '&banner=true' : urls + '?id=' + idCompany;
texts = bannerDone ? 'clicked banner' : 'without banner';

page.open(urls, function (status) {
if (status == 'success') {
exitAll(texts)
} else {
exitAll(texts + 'fail send success')
}
});
}


}

function nextPage() {
if (scenario[step]) {
setTimeout(function () {
setTimeout(function () {
page.open(scenario[step][0], function (status) {
if (status != 'success') {
sendAjax('scenario[step] cant open' + scenario[step][0])
}
});
}, 1)
}, scenario[step][1]);
} else {
sendAjax('scenario[step] out of range')
}
step++
}


page.onUrlChanged = function (targetUrl) {
loaded = 0
console.log('targetUrl', targetUrl)
page.onLoadFinished = function (status) {
if (loaded != 0) {
return
}
loaded++

if (step < scenario.length - 1) {
nextPage()
} else {
if (bannerClick) {
setTimeout(function () {
console.log('sendAjax')
sendAjax(1)

}, 6000)
} else {
sendAjax(1)
}
}

}
}

/* переход на страницу входа */
setTimeout(function () {
setTimeout(function () {
function getButt() {
console.log('go')
page.evaluate(function (idIndex) {
document.querySelector(idIndex).click()
}, idIndex)
}

getButt();
}, 1)
}, 1000);

})

