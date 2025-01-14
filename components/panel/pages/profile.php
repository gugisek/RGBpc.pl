<section data-aos="fade-up" data-aos-delay="100">
    <h1 class="font-medium text-2xl">Mój profil</h1>
</section>
<section>
<?php
session_start();
$id = $_SESSION['login_id'];
include "../../../scripts/conn_db.php";
$sql = "SELECT users.id, users.name, users.profile_picture, users.sur_name, users.mail, role_id, status_id, description FROM users where users.id = $id;";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        //rozdziel imie i nazwisko
        $name = $row['name'];
        $sur_name = $row['sur_name'];
        $email = $row['mail'];
        $role_id = $row['role_id'];
        $description = $row['description'];
        $status_id = $row['status_id'];
        if ($row['profile_picture'] == NULL) {
            $img = 'default.png';
        }else{
            $img = $row['profile_picture'];
        }
    }
}
?>
<form data-aos="fade-up" data-aos-delay="150" action="scripts/users/edit_profile.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-8 items-center justify-center">
    <input type="hidden" name="id" value="<?=$id?>">
    <div class="mt-4 flex flex-col items-center justify-center">
            <label for="photo_img" class="h-24 w-24 flex-shrink-0 hover:scale-105 hover:shadow-xl duration-150 active:scale-95 cursor-pointer rounded-full">
                <img id="popup_img_inpt_photo_img" class="h-24 w-24 aspect-square rounded-full object-cover border border-black/10" src="img/users_images/<?=$img?>" alt="">
            </label>
            <input onchange="imgPrevProduct('photo_img')" type="file" name="photo_img" id="photo_img" class="hidden">
    </div>
    <div>
        
    <div class="mt-4 flex md:flex-row flex-col gap-2">
    <div class="w-full">
        <label for="name" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Imię</label>
        <div class="mt-2">
            <input name="name" id="name" type="text" value="<?=$name?>" placeholder="Wpisz imię" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
        </div>
    </div>
    <div class="w-full">
        <label for="sur_name" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Nazwisko</label>
        <div class="mt-2">
            <input name="sur_name" id="sur_name" type="text" value="<?=$sur_name?>" placeholder="Wpisz nazwisko" class="border rounded-xl w-full py-1.5 px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
        </div>
    </div>
    </div>

    <div class="mt-4 flex md:flex-row flex-col gap-2">
    <div class="w-full">
        <label for="email" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Email</label>
        <div class="mt-2">
            <input name="email" id="email" type="email" value="<?=$email?>" placeholder="Wpisz email" class="border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white" required>
        </div>
    </div>
    </div>

    
   

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-full">
            <label for="description" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Opis</label>
            <div class="mt-2">
                <textarea name="description" id="description" type="text" placeholder="Nic tu nie ma..." class="border rounded-2xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white"><?=$description?></textarea>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-row gap-2">
        <div class="w-1/2">
            <label for="pswd" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Hasło</label>
            <div class="mt-2">
                <input name="pswd" id="pswd" type="password" placeholder="Wpisz hasło" class="border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white">
            </div>
        </div>
        <div class="w-1/2">
            <label for="repeat_pswd" class="ml-px block pl-2 text-sm font-medium leading-6 text-gray-900">Powtórz hasło</label>
            <div class="mt-2">
                <input name="repeat_pswd" id="repeat_pswd" type="password" placeholder="Powtórz hasło" class="border rounded-xl py-1.5 w-full px-4 text-sm border-gray-400 focus:ring-0 focus:outline-0 focus:bg-[#1c1c1c] focus:border-[#1c1c1c] focus:shadow-xl duration-150 font-medium focus:text-white">
            </div>
        </div>
    </div>

    <div class="mt-6 sm:mt-6 mb-2 sm:flex sm:flex-row-reverse">
        <button class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 duration-150 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-green-500 sm:ml-2 sm:w-auto">Zapisz</button>
        </div>
    </div>
</form>

</section>