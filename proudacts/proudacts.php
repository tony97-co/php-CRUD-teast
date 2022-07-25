<?php

function getProudacts()
{
    return json_decode(file_get_contents(__DIR__ . '/proudacts.json'), true);
}

function getProudactById($id)
{
    $proudacts = getProudacts();
    foreach ($proudacts as $proudact) {
        if ($proudact['id'] == $id) {
            return $proudact;
        }
    }
    return null;
}

function createProudact($data)
{
    $proudacts = getProudacts();

    $data['id'] = rand(1000000, 2000000);

    $proudacts[] = $data;

    putJson($proudacts);

    return $data;
}

function updateProudact($data, $id)
{
    $updateProudact= [];
    $Proudacts = getProudacts();
    foreach ($Proudacts as $i => $Proudact) {
        if ($Proudact['id'] == $id) {
            $Proudacts[$i] = $updateProudact = array_merge($Proudact, $data);
        }
    }

    putJson($Proudacts);

    return $updateProudact;
}

function deleteProudact($id)
{
    $Proudacts = getProudacts();

    foreach ($Proudacts as $i => $Proudact) {
        if ($Proudact['id'] == $id) {
            array_splice($Proudacts, $i, 1);
        }
    }

    putJson($Proudacts);
}

function uploadImage($file, $Proudact)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${Proudact['id']}.$extension");

        $Proudact['extension'] = $extension;
        updateProudact($Proudact, $Proudact['id']);
    }
}

function putJson($Proudacts)
{
    file_put_contents(__DIR__ . '/proudacts.json', json_encode($Proudacts, JSON_PRETTY_PRINT));
}

function validateProudact($proudact, &$errors)
{
    $isValid = true;
 
    if (!$proudact['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
 
    return $isValid;
}
