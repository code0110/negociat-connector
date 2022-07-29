<?php

namespace Botble\NegociatConnector\Models;

use Botble\ACL\Models\User;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class NegociatProduct extends BaseModel
{
    use EnumCastable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_n',
        'grupa',
        'nume_produs',
        'cod',
        'cod_pack',
        'um',
        'valuta',
        'stoc',
        'pret_intrare',
        'pret_lista',
        'pret_neg',
        'pret_lista_neg',
        'comision_neg',
        'adaos_neg',

    ];
}
