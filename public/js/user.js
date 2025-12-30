$(function () {

    let deleteIds = [];
    const defaultProfilePic = '/image/profile.jpeg';

    fetchUsers();

    $('#addNewBtn').on('click', function () {
        fetchCategoryHobby();
        resetForm();
        $('#tableDiv').addClass('hidden');
        $('#formDiv').removeClass('hidden');
    });

    $('#cancleBtn').on('click', function () {
        resetForm();
        $('#formDiv').addClass('hidden');
        $('#tableDiv').removeClass('hidden');
    });

    $(document).on('click', '.editBtn', function () {

        let userId = $(this).data('id');
        fetchCategoryHobby();

        $.ajax({
            url: `/users/${userId}/edit`,
            type: "GET",
            success: function (res) {

                $('#user_id').val(res.user.id);
                $('input[name="name"]').val(res.user.name);
                $('input[name="contact_no"]').val(res.user.contact_no);

                $('#categorySelect').val(res.user.categories[0]?.id);

                $('input[name="hobbies[]"]').prop('checked', false);
                res.user.hobbies.forEach(hobby => {
                    $(`input[name="hobbies[]"][value="${hobby.id}"]`)
                        .prop('checked', true);
                });

                if (res.user.profile_pic) {
                    $('#profilePreview')
                        .attr('src', `/storage/${res.user.profile_pic}`)
                        .removeClass('hidden');
                    $('#removeImageBtn').removeClass('hidden');
                } else {
                    $('#profilePreview')
                        .attr('src', defaultProfilePic)
                        .removeClass('hidden');

                    $('#removeImageBtn').addClass('hidden');
                }

                $('#tableDiv').addClass('hidden');
                $('#formDiv').removeClass('hidden');
            }
        });
    });

    $('#profile_pic').on('change', function () {
        const file = this.files[0];
        if (file) {
            $('#profilePreview')
                .attr('src', URL.createObjectURL(file))
                .removeClass('hidden');
            $('#removeImageBtn').removeClass('hidden');
        }
    });

    $('#removeImageBtn').on('click', function () {

        $('#profilePreview').attr('src', '').addClass('hidden');
        $('#profile_pic').val('');
        $('#remove_image').val(1);
        $(this).addClass('hidden');
    });


    $('#userForm').on('submit', function (e) {
        e.preventDefault();
        $('.error-text').text('');
        let userId = $('#user_id').val();
        let url = userId
            ? `/users/${userId}/update`
            : USERS_STORE_URL;

        let formData = new FormData(this);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert(res.message);
                    resetForm();
                    $('#formDiv').addClass('hidden');
                    $('#tableDiv').removeClass('hidden');
                    fetchUsers();
                }
            },
            error: function (xhr) {

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        $(`[data-error="${field}"]`).text(messages[0]);
                    });
                } else {
                    alert('Something went wrong');
                }
            }
        });
    });


    $(document).on('click', '.deleteBtn', function () {

        deleteIds = [];

        let id = $(this).data('id');

        if (id) {
            deleteIds.push(id);
        } else {
            $('.userCheckbox:checked').each(function () {
                deleteIds.push($(this).val());
            });

            if (deleteIds.length === 0) {
                alert('Select at least one record');
                return;
            }
        }

        $('#deleteModal').removeClass('hidden').addClass('flex');
    });

    $('#confirmDelete').on('click', function () {

        $.ajax({
            url: USERS_DELETE_URL,
            type: "DELETE",
            data: {
                _token: CSRF_TOKEN,
                ids: deleteIds
            },
            success: function (res) {
                if (res.success) {
                    alert(res.message);
                    fetchUsers();
                }
                closeDeleteModal();
            }
        });
    });

    $('#cancelDelete').on('click', closeDeleteModal);


    function fetchUsers() {
        $.ajax({
            url: USERS_LIST_URL,
            type: "GET",
            success: function (res) {
                $('#userTableBody').html(res.html);
            }
        });
    }

    function fetchCategoryHobby() {
        $.ajax({
            url: CATEGORY_HOBBY_URL,
            type: "GET",
            success: function (res) {
                $('#categorySelect').html(res.categories);
                $('#hobbyCheckboxes').html(res.hobbies);
            }
        });
    }

    function closeDeleteModal() {
        $('#deleteModal').addClass('hidden').removeClass('flex');
    }

    function resetForm() {
        $('#userForm')[0].reset();
        $('#user_id').val('');
        $('#profilePreview').attr('src', '').addClass('hidden');
        $('#removeImageBtn').addClass('hidden');
    }

});

