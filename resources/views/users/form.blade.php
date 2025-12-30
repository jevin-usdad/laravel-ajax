<div id="formDiv" class="px-[250px] pt-[50px] pb-0 hidden">
    <form id="userForm" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" id="user_id">

        <table class="w-full">

            <tr>
                <td class="p-3 font-bold">Name<span class="required">*</span></td>
                <td class="p-3 border border-black">
                    <input type="text" name="name" class="w-full border border-black bg-blue-100 p-2">
                    <p class="text-red-600 text-sm error-text" data-error="name"></p>
                </td>
            </tr>

            <tr>
                <td class="p-3 font-bold">Contact no.</td>
                <td class="p-3">
                    <input type="text" name="contact_no" class="w-full border border-black bg-blue-100 p-2">
                    <p class="text-red-600 text-sm error-text" data-error="contact_no"></p>
                </td>
            </tr>

            <tr>

                <td class="p-3 font-bold">Hobby<span class="required">*</span></td>
                <td class="p-3">
                    <div id="hobbyCheckboxes"></div>
                    <p class="text-red-600 text-sm error-text" data-error="hobbies"></p>
                </td>
            </tr>

            <tr>
                <td class="p-3 font-bold">Category</td>
                <td class="p-3">
                    <select name="category_id" id="categorySelect"
                        class="w-full border border-black bg-blue-100 p-2 cursor-pointer">
                    </select>
                    <p class="text-red-600 text-sm error-text" data-error="category_id"></p>
                </td>
            </tr>


            <tr>
                <td class="p-3 font-bold">Profile pic</td>
                <td class="p-3 flex gap-2" style="border:none;">
                    <input type="hidden" name="remove_image" id="remove_image" value="0">
                    <div class="relative inline-block">
                        <img id="profilePreview" src="" class="h-[70px] w-[70px] object-cover border hidden">
                        <button type="button" id="removeImageBtn"class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-5 h-5 text-xs hidden">
                            ✕
                        </button>
                    </div>
                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                        class="w-full border border-black bg-blue-100 p-2 cursor-pointer">
                    <button type="button" onclick="document.getElementById('profile_pic').click()"
                        class="border border-black px-4 bg-gray-200 cursor-pointer">Upload</button>
                    <p class="text-red-600 text-sm error-text" data-error="profile_pic"></p>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="p-3">
                    <div class="flex justify-center gap-3">
                        <button type="submit" class="bg-green-600 text-black px-4 py-2 cursor-pointer">
                            Save
                        </button>
                        <button type="button" id="cancleBtn" class="bg-red-400 text-black px-4 py-2 cursor-pointer">
                            Cancle
                        </button>
                    </div>
                </td>
            </tr>

        </table>

    </form>
</div>
