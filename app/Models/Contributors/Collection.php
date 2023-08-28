<?php

namespace App\Models\Contributors;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'title',
        'description',
        'target_amount',
        'link'
    ];
    protected $visible = [
        'id',
        'title',
        'description',
        'target_amount',
        'link'
    ];

    public function getDetails(int $collectionId): array
    {
        $collectionData = self::select(
            'id',
            'title',
            'description',
            'target_amount',
            'link')
            ->where('id', $collectionId)
            ->first()
            ->toArray();
        return $collectionData;
    }

    public function getList(
        ? string $title = '',
        ? string $description = '',
        ? string $target_amount = '',
        ? string $link = '',
        ? string $completed = ''): array
    {
        $list = self::
              where('title', 'like', '%' . $title . '%')
            ->where('description', 'like', '%' . $description . '%')
            ->where('target_amount', 'like', '%' . $target_amount . '%')
            ->where('link', 'like', '%' . $link . '%')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        foreach ($list as $key =>$row) {
            $contritutors = self::find($row['id'])->contritutors;
            $list[$key]['completed'] = $row['target_amount'] > array_sum($contritutors->pluck('amount')->toArray()) ? 0 : 1;

            if (trim($completed) === "0"){
                if ($list[$key]['completed'] !== 0) { unset($list[$key]); }
            }

            if (trim($completed) === "1"){
                if ($list[$key]['completed'] !== 1) { unset($list[$key]); }
            }
        }

        return $list;
    }

    public function contritutors(): HasMany
    {
        return $this->hasMany(Contributor::class);
    }
}
