<?php

declare (strict_types = 1);

// Funtcion to create a card with the task

function create_card(string $description, string $id, string $status): string
{
    $server = $_SERVER["PHP_SELF"];
    $editor = "./Parts/task_editor.php";
    $card_template = <<<delimiter
    <div class="card mb-3 bg-light">
        <form action="$server" method="post" id="delete"></form>
        <form action="$editor" method="get" id="edit"></form>
            <div class="card-body p-3">
                <div class="float-right mr-n2">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="check" value="$status, $id" form="delete" onChange="submit()" />
                        <span class="custom-control-label"></span>
                    </label>
                </div>
                <p>
                    $description
                </p>
                <div class="float-right mt-n1">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="32"
                        height="32" class="rounded-circle" alt="Avatar" />
                </div>
                <button type="submit" name="edit" value="$id,$description" form="edit" class="btn btn-outline-primary btn-sm">Edit</button>
                <button type="submit" name="delete" value="$id" form="delete" class="btn btn-outline-danger btn-sm">Delete</button>
            </div>
    </div>
    delimiter;
    return $card_template;
}

// htmlspecialchar function to avoid XSS attacks
function codificarHTML(string $string): string {
    return htmlspecialchars($string, ENT_NOQUOTES | ENT_SUBSTITUTE, "UTF-8");
};