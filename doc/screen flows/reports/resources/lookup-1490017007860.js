(function(window, undefined) {
  var dictionary = {
    "cf5e86b2-86d6-42fc-8545-d7f142885492": "Doanh thu theo tháng",
    "a6a9768b-f5a3-4f22-ad49-f6ec7826358c": "Thống kê theo cửa hàng",
    "7bc8e0fd-5e36-4179-96cb-c0695f0cb444": "Thống kê theo nhân viên",
    "ea70311e-1a7a-4d05-b1d6-60b116c01555": "Báo cáo",
    "938199ee-dede-49f6-a2f6-c2b18c0ea50c": "Thống kê theo thuốc",
    "3644e169-0ae7-4809-88c7-9d9c4eeb8963": "Thống kê chung",
    "cb1453e5-2d61-4537-afff-4b1142b9a10c": "Thống kê theo Doanh thu",
    "f39803f7-df02-4169-93eb-7547fb8c961a": "Template 1",
    "bb8abf58-f55e-472d-af05-a7d1bb0cc014": "default"
  };

  var uriRE = /^(\/#)?(screens|templates|masters|scenarios)\/(.*)(\.html)?/;
  window.lookUpURL = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, url;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      url = folder + "/" + canvas;
    }
    return url;
  };

  window.lookUpName = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, canvasName;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      canvasName = dictionary[canvas];
    }
    return canvasName;
  };
})(window);