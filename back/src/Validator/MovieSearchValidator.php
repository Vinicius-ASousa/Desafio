<?php

namespace App\Validator;

use App\Validator\Validator;

class MovieSearchValidator extends Validator
{
    public function validate(): bool
    {
        $data = $this->getData();
        if ($data['name'] == "") {
            $this->error['name'] = [
                'required' => "O campo nome é obrigatório"
            ];
        }

        if (mb_strlen($data['name']) > 250) {
            if (!isset($this->error['name'])) {
                $this->error['name'] = [];
            }

            $this->error['name']['max-length'] = "O campo nome não pode conter mais de 250 caractéres";
        }

        return empty($this->error);
    }
}
