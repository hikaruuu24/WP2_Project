<!-- JAVASCRIPT -->
<script src=<?= base_url("assets/libs/jquery/jquery.min.js")?>></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src=<?= base_url("assets/libs/bootstrap/js/bootstrap.bundle.min.js")?>></script>
<script src=<?= base_url("assets/libs/metismenu/metisMenu.min.js")?>></script>
<script src=<?= base_url("assets/libs/simplebar/simplebar.min.js")?>></script>
<script src=<?= base_url("assets/libs/node-waves/waves.min.js")?>></script>
<!-- App js -->
<script src=<?= base_url("assets/js/app.js")?>></script>
<script>
    function logout() {
    $.confirm({
        icon: 'fas fa-sign-out-alt',
        title: 'Logout',
        theme: 'supervan',
        content: 'Are you sure want to logout?',
        autoClose: 'cancel|8000',
        buttons: {
            logout: {
                text: 'logout',
                action: function () {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url('logout');?>',
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            $.alert('Failed!');
                            console.log(data);
                        }
                    });
                }
            },
            cancel: function () {
                
            }
        }
    });
}
</script>
<?= $this->renderSection('js'); ?>