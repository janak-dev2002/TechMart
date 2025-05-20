function signinAsadmin() {

    var email = document.getElementById("email");
    var pass = document.getElementById("pass");
    var rememberme = document.getElementById("rememberme").checked;

    var f = new FormData();

    f.append("em", email.value);
    f.append("pw", pass.value);
    f.append("re", rememberme);


    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;

            alert(t);

            if (t == "success") {
                window.location = "adminPanel.php";
            } else {

                alert(t);
                // document.getElementById("msg2").innerHTML = res;
            }
        }
    }

    r.open("POST", "adminSignInProccess.php", true);
    r.send(f);
}


function signUp() {

    var fname = document.getElementById("fn_s");
    var lname = document.getElementById("ln_s");
    var email = document.getElementById("ems_s");
    var mobile = document.getElementById("mb_s");
    var pass = document.getElementById("pw_s");
    var gen = document.getElementById("gen_s");

    var f = new FormData();

    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("em", email.value);
    f.append("mb", mobile.value);
    f.append("pw", pass.value);
    f.append("gn", gen.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alert(t);
                window.location = "index.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}

function signin() {

    var email = document.getElementById("em");
    var pass = document.getElementById("pw");
    var rememberme = document.getElementById("rememberme").checked;

    var f = new FormData();

    f.append("em", email.value);
    f.append("pw", pass.value);
    f.append("re", rememberme);

    var r = new XMLHttpRequest();


    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                window.location = "index.php";
            } else {

                alert(t);
                // document.getElementById("msg2").innerHTML = res;
            }
        }
    }

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}

function signOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var res = r.responseText;
            if (res == "Success") {

                window.location.reload();
                // window.location = "index.php";
            } else {

                alert(res);

            }

        }
    }

    r.open("GET", "SignOutProccess.php", true);
    r.send();
}

var bm;
function forgotPassword() {

    var email = document.getElementById("em").value;

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {

        if (req.readyState == 4) {
            var res = req.responseText;
            if (res == "Success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(res);
            }
        }
    }

    req.open("GET", "forgotPasswordProccess.php?em=" + email, true);
    req.send();
}


function showPassword1() {

    var i = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function showPassword2() {

    var i = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }

}

function resetpw() {


    var email = document.getElementById("em");
    var newPass = document.getElementById("npi");
    var reNewPass = document.getElementById("rnp");
    var vcode = document.getElementById("vc");

    var f = new FormData();
    f.append("em", email.value);
    f.append("np", newPass.value);
    f.append("rp", reNewPass.value);
    f.append("vc", vcode.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var res = r.responseText;

            if (res == "success") {

                bm.hide();
                alert("Password reset success");


            } else {
                alert(res);
            }

        }
    }

    r.open("POST", "resetPassword.php", true);
    r.send(f);
}

function updateImage() {

    var view = document.getElementById("viewimage");
    var file = document.getElementById("profileimg");

    file.onchange = function () {

        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }
}

function updateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mob");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("distric");
    var city = document.getElementById("city");
    var pCode = document.getElementById("postalCode");
    var image = document.getElementById("profileimg");

    var f = new FormData;

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("line1", line1.value);
    f.append("line2", line2.value);
    f.append("province", province.value);
    f.append("district", district.value);
    f.append("city", city.value);
    f.append("pCode", pCode.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure you don't want to update profile image");

        if (confirmation) {
            alert("You have not selected any image");
        }
    } else {
        f.append("image", image.files[0]);
    }

    var req = new XMLHttpRequest;

    req.onreadystatechange = function () {
        if (req.readyState == 4) {

            var res = req.responseText;
            if (res == "success") {

                window.location.reload();
            } else {
                alert(res);
            }
        }
    }

    req.open("POST", "updateUserProccess.php", true);
    req.send(f);


}

function changeProductImage() {


    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                // alert(x);
                document.getElementById("img" + x).src = url;

            }
        } else {
            alert("Please select 3 or less than 3 images.");
        }
    }
}


function addProduct() {


    var Subcategory = document.getElementById("subcategory");
    var category = document.getElementById("miniCategory");
    var brand = document.getElementById("brand");
    var model = document.getElementById("modal");
    var title = document.getElementById("title");
    var condition = 0;
    if (document.getElementById("inlineRadio1").checked) {
        condition = 1;
    } else if (document.getElementById("inlineRadio2").checked) {
        condition = 2;
    }

    var addc = document.getElementById("clr_in");
    var color = document.getElementById("clr");
    var qty = document.getElementById("qty");
    var cost = document.getElementById("cost");
    var dwc = document.getElementById("dwc");
    var doc = document.getElementById("doc");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    var f = new FormData;

    f.append("subcat", Subcategory.value);
    f.append("cat", category.value);
    f.append("bra", brand.value);
    f.append("mod", model.value);
    f.append("tit", title.value);
    f.append("con", condition);
    f.append("clr_in", addc.value);
    f.append("clr", color.value);
    f.append("qty", qty.value);
    f.append("cost", cost.value);
    f.append("dwc", dwc.value);
    f.append("doc", doc.value);
    f.append("des", desc.value);
    alert(brand.value);
    var file_count_i = image.files.length;

    for (var x = 0; x < file_count_i; x++) {

        f.append("image" + x, image.files[x]);
    }

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var res = r.responseText;

            if (res == "Product Save Successfully") {

                window.location.reload();
            } else {
                alert(res);

            }

        }
    }

    r.open("POST", "addProductProccess.php", true);
    r.send(f);

}


function loadSub() {


    var category = document.getElementById("category").value;

    // alert(category);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            document.getElementById("subcategory").innerHTML = res;
        }
    }

    r.open("GET", "loadSubCategory.php?c=" + category, true);
    r.send();
}


function loadmini() {


    var sub_category = document.getElementById("subcategory").value;

    // alert(category);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            document.getElementById("miniCategory").innerHTML = res;
        }
    }

    r.open("GET", "loadMiniCategory.php?sc=" + sub_category, true);
    r.send();
}


function loadbrand() {


    var brand = document.getElementById("miniCategory").value;

    // alert(category);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            document.getElementById("brand").innerHTML = res;
        }
    }

    r.open("GET", "loadBrand.php?br=" + brand, true);
    r.send();
}

function brnd_input() {

    var brand = document.getElementById("brnd_in").value;
    var minicatID = document.getElementById("miniCategory").value;

    if (minicatID == 0) {
        alert("Please Select a Product Category");
    } else {

        var r = new XMLHttpRequest;

        r.onreadystatechange = function () {
            if (r.readyState == 4) {

                var res = r.responseText;
                document.getElementById("brand").innerHTML = res;
                alert("You have added " + brand);
            }
        }

        r.open("GET", "brandInput.php?br=" + brand + "&mid=" + minicatID, true);
        r.send();

    }

}


function model_input() {

    var model = document.getElementById("model_in").value;


    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            document.getElementById("modal").innerHTML = res;
            alert("You have added " + model);
        }
    }

    r.open("GET", "ModelInput.php?mtxt=" + model, true);
    r.send();


}

function loadModel() {


    var modal = document.getElementById("brand").value;

    // alert(category);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            document.getElementById("modal").innerHTML = res;
        }
    }

    r.open("GET", "loadModel.php?mo=" + modal, true);
    r.send();
}

function changeStatus(id) {

    var ProductId = id;

    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            var res = r.responseText;
            if (res == "Deactivated") {

                // alert("Product Deactivated");
                window.location.reload();

            } else if (res == "Activated") {

                // alert("Product Activated");
                window.location.reload();
            } else {

                alert(res);
            }

        }
    }

    r.open("GET", "changeStatusProccess.php?p=" + ProductId, true);
    r.send();
}

function sendId(id) {

    var Pid = id;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var res = r.responseText;
            if (res == "successs") {
                window.location = "productUpdate.php";
            } else {
                alert(res);
            }
        }
    }

    r.open("GET", "sendProductProccess.php?id=" + Pid, true);
    r.send();
}


function removeItem(id) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var res = r.responseText;
            if (res == "successs") {
                window.location = "manageProducts.php";
            } else {
                alert(res);
            }
        }
    }

    r.open("GET", "removeItemProcess.php?id=" + id, true);
    r.send();
}

function sort(x) {


    var search = document.getElementById("s");
    var time = 0;

    if (document.getElementById("new").checked) {
        time = 1;
    } else if (document.getElementById("old").checked) {
        time = 2;
    }

    var qty = 0;

    if (document.getElementById("H").checked) {
        qty = 1
    } else if (document.getElementById("L").checked) {
        qty = 2;
    }

    var condition = 0;

    if (document.getElementById("B").checked) {
        condition = 1
    } else if (document.getElementById("U").checked) {
        condition = 2;
    }


    var f = new FormData();

    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("c", condition);
    f.append("page", x);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var res = r.responseText;
            //  alert(res);
            document.getElementById("sortview").innerHTML = res;
        }
    }

    r.open("POST", "sortingProcess.php", true);
    r.send(f);

}

function clearSort() {
    window.location.reload();
}


var selectedMiniCategoryId;
var selectedMiniCategoryName;
function slectedCat(id, categoryName) {

    document.getElementById("dropdownbtn").innerHTML = categoryName;
    selectedMiniCategoryId = id;
    selectedMiniCategoryName = categoryName;

}






function basicSearch(x) {

    // alert("okkkk");

    var txt = document.getElementById("basic_search_text");
    var select = selectedMiniCategoryId;

    if (select == null) {

        select = 0;
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            window.location = "productListning.php?selected_category=" + select + "&searchKey=" + txt.value;
        }
    }
    r.open("GET", "productListning.php?selected_category=" + select + "&searchKey=" + txt.value + "$page=" + x, true);
    r.send();

}


function updateProduct() {

    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var dcw = document.getElementById("dcw");
    var dco = document.getElementById("dco");
    var desc = document.getElementById("desc");
    var itemprice = document.getElementById("iprice");
    var images = document.getElementById("imageuploader");

    var f1 = new FormData();

    f1.append("t", title.value);
    f1.append("q", qty.value);
    f1.append("dcw", dcw.value);
    f1.append("dco", dco.value);
    f1.append("desc", desc.value);
    f1.append("iprice", itemprice.value);

    var file_count = images.files.length;

    for (var z = 0; z < file_count; z++) {

        f1.append("img" + z, images.files[z]);

    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var res = r.responseText;
            alert(res);
            window.location = "manageProducts.php";
        }
    }

    r.open("POST", "updateProductProccess.php", true);
    r.send(f1);

}


function loadProductFromCategory(id, y) {

    //  alert(y);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;

            // alert(t);
            document.getElementById("basic_search_result").innerHTML = t;

        }
    }

    r.open("GET", "loadCategoryProduct.php?cid=" + id + "&page=" + y, true);
    r.send();

}


function loadProductFromCategoryToView(id) {


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;

            document.getElementById("viewProducts").innerHTML = t;
        }
    }

    r.open("GET", "loadCategoryProductRelated.php?cid=" + id, true);
    r.send();

}

function test(x) {
    alert(x);
}


function selectCategory(urlName, Minicid) {

    var btnId = "1";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            window.location = "selectedCategory.php?ur=" + urlName + "&mid=" + Minicid;

        }
    }

    r.open("GET", "selectedCategory.php?ur=" + urlName + "&mid=" + Minicid + "&btnId=" + btnId);
    r.send();

}


// function selectSubCategory(Sid){

//     alert(Sid);

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {

//         if (r.readyState == 4) {

//             window.location = "selectedCategory.php?ur=" + urlName + "&mid=" + Minicid;

//         }
//     }

//     r.open("GET","selectedCategory.php?sid=" + Sid + "&btnId=" + btnId);
//     r.send();
// }


function advancedSearch(x) {

    var txt = document.getElementById("t");
    var category = document.getElementById("miniCategory");
    var brand = document.getElementById("brand");
    var model = document.getElementById("modal");
    var condition = 0;
    if (document.getElementById("B").checked) {
        condition = 1;
    } else if (document.getElementById("U").checked) {
        condition = 2;
    }
    var color = document.getElementById("clr");
    var from = document.getElementById("pf");
    var to = document.getElementById("pt");
    var sort = document.getElementById("s");


    var f = new FormData();

    f.append("t", txt.value);
    f.append("c1", category.value);
    f.append("b1", brand.value);
    f.append("m", model.value);
    f.append("c2", condition);
    f.append("c3", color.value);
    f.append("pf", from.value);
    f.append("pt", to.value);
    f.append("s", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var res = r.responseText;
            document.getElementById("view_area").innerHTML = res;
        }
    }

    r.open("POST", "addvanceSearchProccess.php", true);
    r.send(f);

}


function changimg(x) {

    var img = document.getElementById("imgp" + x).src;
    document.getElementById("mainimg").src = img

}

function desc() {

    document.getElementById("review_a").className = "nav-link cursorrr";
    document.getElementById("desc_a").className = "nav-link cursorrr active";
    document.getElementById("desText").className = "col-12 mt-5 d-block"
    document.getElementById("revtext").className = "d-none col-12 mt-5";
}

function revi() {

    document.getElementById("desc_a").className = "nav-link cursorrr";
    document.getElementById("review_a").className = "nav-link active cursorrr";
    document.getElementById("desText").className = "col-12 mt-5 d-none"
    document.getElementById("revtext").className = "d-block col-12 mt-5";

}

function watchlistWithoutSign() {

    window.location = "logReg.php";
}


function addtoWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var res = r.responseText;

            if (res == "removed") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else if (res == "added") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else if (res == "NotLogin") {

                window.location.href = "logReg.php";

            }

        }
    }

    r.open("GET", "addToWatchlistProccess.php?id=" + id, true);
    r.send();
}

function removeFromWatchlist(id) {

    // alert(id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            window.location.reload();
            alert(t);

        }
    }

    r.open("GET", "removeWatchlistProccess.php?id=" + id, true);
    r.send();
}

var items;
function numRowsItems(n) {

    items = n;

}

function removeSelectedWatchlist() {

    var checks = document.getElementsByClassName('checks');

    var wid = "";

    var f = new FormData();
    f.append("num", items);

    for (i = 0; i < items; i++) {

        if (checks[i].checked == true) {

            f.append("a" + i, wid += checks[i].value);
        }
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
        }
    }

    r.open("POST", "removeAllWatchlist.php", true);
    r.send(f);
}

function addtoCart(id) {


    // alert(id);
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
            // window.location.reload();
        }
    }


    r.open("GET", "addtoCartProccess.php?id=" + id, true);
    r.send();
}


function addtoCartInItemView(pid) {

    alert(pid);

    var buyQty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);
        }
    }


    r.open("GET", "addtoCartProccessItemView.php?id=" + pid + "&bqty=" + buyQty, true);
    r.send();

}

function promoChecking() {

    var promotxt = document.getElementById("promoText").value;


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;

            if (t == "success") {
                promoApply();
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "promoCodeChecking.php?code=" + promotxt);
    r.send();

}

function promoApply() {

    var promotxt = document.getElementById("promoText").value;
    var currentTot = document.getElementById("grandTot").outerText;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            // alert(t);
            document.getElementById("grandTot").innerText = t;
        }
    }

    r.open("GET", "promoProcess.php?code=" + promotxt + "&ctotal=" + currentTot);
    r.send();

}

function removeFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product removed from cart");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();

}


var payM;
function payNow(id, qty, btn_type,shipping) {

    if (btn_type == 0) {


        var obj = "";
        var mail = "";
        var amount = "";

        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {

            if (r.readyState == 4) {

                var t = r.responseText;
                // alert(t);
                obj = JSON.parse(t);

                mail = obj["mail"];
                amount = obj["amount"];

                if (t == "1") {
                    alert("Please log in or sign up");
                    window.location = "index.php";
                } else if (t == "2") {
                    alert("Please update your profile first");
                    window.location = "userProfile.php";
                } else {

                    DirectPayCardPayment.init({
                        container: 'card_container', //<div id="card_container"></div>
                        merchantId: 'ET15289', //your merchant_id
                        amount: amount,
                        refCode: obj["id"], //unique referance code form merchant
                        currency: 'LKR',
                        type: 'ONE_TIME_PAYMENT',
                        customerEmail: mail,
                        customerMobile: obj["mobile"],
                        description: 'test products',  //product or service description
                        debug: true,
                        responseCallback: responseCallback,
                        errorCallback: errorCallback,
                        logo: 'https://test.com/directpay_logo.png',
                        apiKey: 'fbe450286eaaf5741e59eaf48719ad91bb1f6ecb8eae6a4b1d797a9f0cedd33f'
                    });
                }

            }
        }

        r.open("GET", "buyNowprocess.php?id=" + id + "&qty=" + qty, true)
        r.send();

        //response callback.
        function responseCallback(result) {
            console.log("successCallback-Client", result);
            console.log(JSON.stringify(result));
            alert(JSON.stringify(result));
            saveInvoice(obj["id"], id, mail, amount, qty, obj["deli_charge"]);
        }

    } else {

        var m = document.getElementById("payPanel");
        payM = new bootstrap.Modal(m);
        payM.show();

        var obj = "";
        var mail = "";
        var amount =  "";


        var r = new XMLHttpRequest();

        r.onreadystatechange = function () {

            if (r.readyState == 4) {

                var t = r.responseText;
                // console.log(t); 
                obj = JSON.parse(t);


                mail = obj["mail"];
                amount = obj["amount"];



                if (t == "1") {
                    alert("Please log in or sign up");
                    window.location = "index.php";
                } else if (t == "2") {
                    alert("Please update your profile first");
                    window.location = "userProfile.php";
                } else {

                    DirectPayCardPayment.init({
                        container: 'card_container', //<div id="card_container"></div>
                        merchantId: 'ET15289', //your merchant_id
                        amount: amount,
                        refCode: obj["id"], //unique referance code form merchant
                        currency: 'LKR',
                        type: 'ONE_TIME_PAYMENT',
                        customerEmail: mail,
                        customerMobile: obj["mobile"],
                        description: 'test products',  //product or service description
                        debug: true,
                        responseCallback: responseCallback,
                        errorCallback: errorCallback,
                        logo: 'https://test.com/directpay_logo.png',
                        apiKey: 'fbe450286eaaf5741e59eaf48719ad91bb1f6ecb8eae6a4b1d797a9f0cedd33f'
                    });
                }

            }
        }

        r.open("GET", "buyNowProcessInCart.php", true);
        r.send();

        //response callback.
        function responseCallback(result) {
            console.log("successCallback-Client", result);
            console.log(JSON.stringify(result));
            // alert(JSON.stringify(result));
            saveInvoiceCart(obj["id"], mail,shipping);
            console.log(shipping);
            alert(shipping);
        }


    }

}



//error callback
function errorCallback(result) {
    console.log("successCallback-Client", result);
    // alert(JSON.stringify(result));
    alert("Error");
}

function saveInvoiceCart(orderId, email, dechrge) {

    var f = new FormData();

    f.append("oid", orderId);
    f.append("mail", email);
    f.append("dechrge", dechrge);

    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var res = req.responseText;
            if (res == 1) {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(res);
            }
        }
    }

    req.open("POST","saveInvoiceCart.php",true);
    req.send(f);
}


function saveInvoice(orderId, id, mail, amount, qty,deChrge) {

     alert(deChrge);

    var f = new FormData();

    f.append("o", orderId);
    f.append("i", id);
    f.append("m", mail);
    f.append("a", amount);
    f.append("q", qty);
    f.append("deChrge", deChrge);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var res = r.responseText;
            if (res == 1) {
                window.location = "invoice.php?id=" + orderId;
            } else {
                alert(res);
            }

        }
    }

    r.open("POST", "saveInvoice.php", true);
    r.send(f);
}


function printInvoice() {

    var body = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = body;
}


function reomovePurchaseHistory(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            window.location.reload();
            alert(t);

        }
    }

    r.open("GET", "removePurchaseHistProccess.php?id=" + id, true);
    r.send();
}


function decreaseNumber(pid) {

    var btnId = "1";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "ok") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }


    r.open("GET", "cartQtyUpdate.php?id=" + pid + "&btnId=" + btnId, true);
    r.send();
}

function increaseNumber(pid) {

    var btnId = "2";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "ok") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }


    r.open("GET", "cartQtyUpdate.php?id=" + pid + "&btnId=" + btnId, true);
    r.send();

}



function addFeedback(id) {

    window.location = "leaveFeedbacks.php?id=" + id;

}


function saveFeedback(id) {

    var type;
    if (document.getElementById("type1").checked) {
        type = 1;
    } else if (document.getElementById("type2").checked) {
        type = 2;
    } else if (document.getElementById("type3").checked) {
        type = 3;
    }

    alert(type);

    var feedback = document.getElementById("feed");

    var f = new FormData();
    f.append("t", type);
    f.append("p", id);
    f.append("f", feedback.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "1") {
                md.hide();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "saveFeedbackProcess.php", true);
    r.send(f);

}


function newlyAddedItems() {

    var btnType = "1";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            document.getElementById("newlyItems").innerHTML = t;
        }
    }


    r.open("GET", "homePagePrograme.php?btn=" + btnType, true);
    r.send();

}


function GamingLaptops() {

    var btnType = "2";

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {

            var t = r.responseText;
            document.getElementById("gamingLaps").innerHTML = t;
        }
    }


    r.open("GET", "homePagePrograme.php?btn=" + btnType, true);
    r.send();

}

//-------5/9/2023----------------------------------------

function goTobuyThis(pid) {

    var qty = document.getElementById("qty_input").value;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4) {

            var res = req.responseText;
            window.location = "buythisItem.php?pid=" + pid + "&qty=" + qty;
        }
    }

    req.open("GET", "buythisItem.php?pid=" + pid + "&qty=" + qty, true);
    req.send();

}


