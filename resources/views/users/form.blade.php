<div id="formDiv" class="px-[250px] pt-[50px] pb-0 hidden">
    <form id="userForm" enctype="multipart/form-data">
        @csrf

        <table class="w-full">

            <tr>
                <td class="p-3 font-bold">Name</td>
                <td class="p-3 border border-black">
                    <input type="text" name="name" class="w-full border border-black bg-blue-100 p-2">
                </td>
            </tr>

            <tr>
                <td class="p-3 font-bold">Contact no.</td>
                <td class="p-3">
                    <input type="text" name="contact_no" class="w-full border border-black bg-blue-100 p-2">
                </td>
            </tr>

            <tr>

                <td class="p-3 font-bold">Hobby</td>
                <td class="p-3">
                    <label class="mr-4">
                        <input type="checkbox" name="hobbies[]" value="programming" />
                        Programming
                    </label>
                    <label class="mr-4">
                        <input type="checkbox" name="hobbies[]" value="programming" />
                        Games
                    </label>
                    <br />
                    <label class="mr-4">
                        <input type="checkbox" name="hobbies[]" value="programming" />
                        Reading
                    </label>
                    <label class="mr-4">
                        <input type="checkbox" name="hobbies[]" value="programming" />
                        PhotoGraphy
                    </label>

                </td>
            </tr>

            <tr>
                <td class="p-3 font-bold">Category</td>
                <td class="p-3">
                    <select name="category_id" class="w-full border border-black bg-blue-100 p-2 cursor-pointer">
                        <option value="">Select Category</option>
                        <option value="1">category 1</option>
                        <option value="2">category 2</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td class="p-3 font-bold">Profile pic</td>
                <td class="p-3 flex gap-2" style="border:none;">
                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                        class="w-full border border-black bg-blue-100 p-2 cursor-pointer">
                    <button type="button" onclick="document.getElementById('profile_pic').click()"
                        class="border border-black px-4 bg-gray-200 cursor-pointer">Upload</button>
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
