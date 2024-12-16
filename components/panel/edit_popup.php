<?php
$id=$_GET['id'];
$for=$_GET['for'];
$quill=$_GET['quill'];
?>
<?php
if($quill=='true'){
    echo '
    <script>
        var qwe = document.getElementById("' . $for . '");
        document.getElementById("asd").innerHTML = qwe.value
    </script>
    <div class="h-full" id="editor-container-popup">
        <span id="asd"></span>
    </div>
    ';
    $quill="Quill";
}else{
    echo '
    <script>
        var qwe = document.getElementById("' . $for . '");
        document.getElementById("input_edit").value = qwe.value;
    </script>
    <div class="h-full">
        <input type="text" id="input_edit" value="" placeholder="Wpisz tu wartość..." class="w-full px-4 py-2 rounded-2xl shadow-xl border border-black/30 outline-violet-600">
    </div>
    ';
    $quill="";
}
?>
<div onclick="insertEdited<?=$quill?>('<?=$for?>');popupEditOpenClose()" class="active:scale-95 duration-150 inline-flex w-full justify-center rounded-full bg-gray-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:shadow-xl hover:bg-violet-600 mt-4">Wstaw dane</div>
<script>
    var quill = new Quill('#editor-container-popup', {
            theme: 'snow',
            placeholder: 'Tu wpisz treść...',
            modules: {
            toolbar: [
                [{ 'color': [false, 'var(--text)', '#ffffff', 'rgb(243 244 246)', 'rgb(229 231 235)', 'rgb(209 213 219)', 'rgb(156 163 175)', 'rgb(107 114 128)', 'rgb(75 85 99)', 'rgb(55 65 81)', 'rgb(31 41 55)', 'rgb(17 24 39)', 'rgb(3 7 18)', 'black'] }],
                [{ 'size': [ 'small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline', 'strike'],  // Funkcje pogrubiania, kursywy, podkreślenia, przekreślenia
                // Dodaj niestandardową paletę kolorów
                ['link'],
                ['blockquote'],
                ['code'],
                ['image'],
                // Inne opcje
                
            ],
            },
        });

        function insertEditedQuill(for_){
            var for_input = document.getElementById(for_);
            var for_demo = document.getElementById(for_ + "_demo");
            for_input.value = quill.root.innerHTML;
            for_demo.innerHTML = quill.root.innerHTML;
        }

        function insertEdited(for_){
            var for_input = document.getElementById(for_);
            var for_demo = document.getElementById(for_ + "_demo");
            for_input.value = document.getElementById("input_edit").value;
            for_demo.innerHTML = document.getElementById("input_edit").value;
        }


</script>