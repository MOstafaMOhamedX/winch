(function () {
    /* ========= sidebar toggle ======== */
    const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
    const mainWrapper = document.querySelector(".main-wrapper");
    const menuToggleButton = document.querySelector("#menu-toggle");
    const menuToggleButtonIcon = document.querySelector("#menu-toggle i");
    const overlay = document.querySelector(".overlay");

    menuToggleButton.addEventListener("click", () => {
        sidebarNavWrapper.classList.toggle("active");
        overlay.classList.add("active");
        mainWrapper.classList.toggle("active");

        if (document.body.clientWidth > 1200) {
            if (menuToggleButtonIcon.classList.contains("lni-close")) {
                menuToggleButtonIcon.classList.remove("lni-close");
                menuToggleButtonIcon.classList.add("lni-menu");
            } else {
                menuToggleButtonIcon.classList.remove("lni-menu");
                menuToggleButtonIcon.classList.add("lni-close");
            }
        } else {
            if (menuToggleButtonIcon.classList.contains("lni-close")) {
                menuToggleButtonIcon.classList.remove("lni-close");
                menuToggleButtonIcon.classList.add("lni-menu");
            }
        }
    });
    overlay.addEventListener("click", () => {
        sidebarNavWrapper.classList.remove("active");
        overlay.classList.remove("active");
        mainWrapper.classList.remove("active");
    });
})();
$(document).on("click", ".show_confirm", function () {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: "Confirm Delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});

$(document).on("click", ".toggle-theme", function () {
    tinymce.remove();
    $("body").toggleClass("darkTheme");
    $(".toggle-theme").toggleClass("fa-toggle-on fa-toggle-off");
    if ($("body").hasClass("darkTheme")) {
        $("#darkTheme").attr("href", window.location.origin + "/css/dark.css");
        tinymce.init({
            selector: "textarea",
            plugins: "advlist autolink lists link image charmap preview anchor pagebreak",
            toolbar_mode: "floating",
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            skin: "oxide-dark",
            content_css: "dark",
        });
    } else {
        $("#darkTheme").attr("href", "");
        tinymce.init({
            selector: "textarea",
            plugins: "advlist autolink lists link image charmap preview anchor pagebreak",
            toolbar_mode: "floating",
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        });
    }
    $.ajax({
        method: "POST",
        url: "/switchTheme",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content"),
        },
    });
    $('.select2').select2();
});

$(document).ready(function () {
    if ($("meta[name='user-theme']").attr("content") == 0) {
        tinymce.init({
            // selector: "textarea",
            selector : "textarea:not(.mceNoEditor)",
            plugins: "advlist autolink lists link image charmap preview anchor pagebreak",
            toolbar_mode: "floating",
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            skin: "oxide-dark",
            content_css: "dark",
        });
    } else {
        tinymce.init({
            // selector: "textarea",
            selector : "textarea:not(.mceNoEditor)",
            plugins: "advlist autolink lists link image charmap preview anchor pagebreak",
            toolbar_mode: "floating",
            toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        });
    }
});


$(document).on("click", "#ToggleSelectAll", function () {
    if( $('#ToggleSelectAll').is(':checked')){
        $('.DTcheckbox').prop('checked', true);
    }else{
        $('.DTcheckbox').prop('checked', false);
    }

    if($('.DTcheckbox:checkbox:checked').length > 0 ){
        $('#DeleteSelected').attr('disabled',false);
    }else{
        $('#DeleteSelected').attr('disabled',true);
    }
});

$(document).on("change", ".DTcheckbox", function () {
    if($('.DTcheckbox:checkbox:checked').length > 0 ){
        if ( $('.DTcheckbox:checkbox:checked').length  <  $('.DTcheckbox').length) {
            $('#ToggleSelectAll').prop('checked', false);
        }else{
            $('#ToggleSelectAll').prop('checked', true)
        }
        $('#DeleteSelected').attr('disabled',false);
    }else{
        $('#ToggleSelectAll').prop('checked', false);
        $('#DeleteSelected').attr('disabled',true);
    }
});


function dragNdrop(event) {
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}
function drag() {
    document.getElementById('uploadFile').parentNode.className = 'draging dragBox';
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}
function drop() {
    document.getElementById('uploadFile').parentNode.className = 'dragBox';
    var name = document.getElementById('uploadFile').files[0].name
    $('#DargTxt').html(name.slice(0, 25));
}
