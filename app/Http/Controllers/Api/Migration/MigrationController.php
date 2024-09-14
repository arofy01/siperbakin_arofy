<?php

namespace App\Http\Controllers\Api\Migration;

use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
//     public function generateTable(Request $request)
//     {
//         $tableName = $request->input('table_name');
//         $columns = $request->input('columns');

//         Schema::create($tableName, function (Blueprint $table) use ($columns) {
//             $table->id();

//             foreach ($columns as $column) {
//                 $columnName = $column['name'];
//                 $columnType = $column['type'];
//                 $isNullable = $column['nullable'] ?? false; // Menambahkan opsi nullable

//                 $columnDefinition = $table->$columnType($columnName);
//                 if ($isNullable) {
//                     $columnDefinition->nullable();
//                 }
//             }

//             $table->timestamps();
//         });

//         // Buat model terkait di dalam subfolder "Models"
//         $modelName = ucfirst($tableName);
//         $modelPath = '/Satudata/' . $modelName;
//         Artisan::call('make:model', [
//             'name' => $modelPath,
//             '-m' => true
//         ]);



//         $modelContent = <<<EOD
//                         <?php

//                         namespace App\Models\Satudata;

//                         use Illuminate\Database\Eloquent\Model;

//                         class $modelName extends Model
//                         {
//                             protected \$table = '$tableName';


//                             public function datainduk()
//                             {
//                                 return $this->belongsTo(Datainduk::class);
//                             }

//                         }

//                         EOD;

//         // Menulis konten model ke dalam file
//         file_put_contents(app_path('Models/' . $modelPath . '.php'), $modelContent);



//         return response()->json(['message' => 'Tabel berhasil dibuat dan model telah dibuat'], 201);
//     }

public function generateTable(Request $request)
{
    $tableName = $request->input('table_name');
    $columns = $request->input('columns');


    // Periksa apakah tabel sudah ada
    if (Schema::hasTable($tableName)) {
        return response()->json(['message' => 'Tabel sudah ada di dalam database, tabel gagal dibuat'], 400);
    }


    Schema::create($tableName, function (Blueprint $table) use ($columns) {
        // $table->id();

        foreach ($columns as $column) {
            $columnName = $column['name'];
            $columnType = $column['type'];

            $columnDefinition = $table->$columnType($columnName);

            foreach ($column['attributes'] ?? [] as $attribute) {
                if (method_exists($table, $attribute)) {
                    $columnDefinition->$attribute();
                }
            }
        }

        $table->timestamps();
    });

    // Buat model terkait di dalam subfolder "Models"
    $modelName = ucfirst($tableName);
    $modelPath = '/Satudata/' . $modelName;
    Artisan::call('make:model', [
        'name' => $modelPath,
        '-m' => true
    ]);

    $modelContent = <<<EOD
        <?php

        namespace App\Models\Satudata;

        use Illuminate\Database\Eloquent\Model;

        class $modelName extends Model
        {
            protected \$table = '$tableName';

            public function datainduk()
            {
                return \$this->belongsTo(Datainduk::class);
            }
        }

        EOD;

    // Menulis konten model ke dalam file
    file_put_contents(app_path('Models/' . $modelPath . '.php'), $modelContent);



    return response()->json(['message' => 'Tabel berhasil dibuat dan model telah dibuat'], 201);
}



}
