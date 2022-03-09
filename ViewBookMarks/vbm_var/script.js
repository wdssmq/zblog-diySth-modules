(() => {
  // 基础函数或变量
  // const curUrl = window.location.href;
  // const curDate = new Date();
  // const $ = window.$ || unsafeWindow.$;
  // const _curUrl = () => { return window.location.href; };
  // const _sleep = (ms) => new Promise((resolve) => setTimeout(resolve, ms));
  function $n(e) {
    return document.querySelector(e);
  }
  function $na(e) {
    return document.querySelectorAll(e);
  }

  function fnMain() {
    const $$a = $na('a');
    const listUrls = [];
    [].forEach.call($$a, (e,i) => {
      const url = e.href;
      e.setAttribute('target', "_blank");
      listUrls.push(url);
    });
    // console.log(listUrls);
    // console.log(listUrls.join('\n'));
  }
  fnMain();
})();
