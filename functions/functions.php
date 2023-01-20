<?php

declare (strict_types = 1);

function create_card(string $description, string $id, string $status): string
{
    $card_template = <<<delimiter
    <div class="card mb-3 bg-light">
        <div class="card-body p-3">
            <div class="float-right mr-n2">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" />
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
            <a class="btn btn-outline-primary btn-sm" href="#" id="$id,$status">View</a>
        </div>
    </div>
    delimiter;

    return $card_template;
}

function codificarHTML(string $string): string {
    return htmlspecialchars($string, ENT_NOQUOTES | ENT_SUBSTITUTE, "UTF-8");
};