$(document).ready(function() {

    $('#avater-input').on('change', function (e) {
        let url = URL.createObjectURL(e.target.files[0]);
        $('#avater').attr('src', url)
    })
    $('#input-son-tipshoi').on('change', function (e) {
        let url = URL.createObjectURL(e.target.files[0]);
        $('#son-tipshoi').attr('src', url)
    })
    $('#input-dor-tipshoi').on('change', function (e) {
        let url = URL.createObjectURL(e.target.files[0]);
        $('#dor-tipshoi').attr('src', url)
    })
})
