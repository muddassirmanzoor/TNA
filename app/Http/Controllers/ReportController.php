<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Markaz;
use App\Models\Tehsil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function showStat(Request $request)
    {
        $districts = District::where('d_status', 1)->get();

        $procedureCall = 'CALL `P_GET_DASHBOARD_LISTING`(?, ?, ?, ?, ?, ?)';

        $pdo = DB::connection('mysql')->getPdo();

        $statement = $pdo->prepare($procedureCall);
        $district_id = null;
        $tehsil_id = null;
        $markaz_id = null;
        $emis_code = null;
        $daterange = null;
        $type = 'ALL_DISTRICT';

        $statement->execute([$district_id, $tehsil_id, $markaz_id, $emis_code, $daterange, $type]);

        $districts_summary = $statement->fetchAll(\PDO::FETCH_OBJ);

        $statement->closeCursor();

        return view('report.listing', [
            'districts' => $districts,
            'districts_summary' => $districts_summary,
        ]);
    }
    public function showStatDetail(Request $request)
    {
        $district_id = $request->input('districtId', null);
        $tehsil_id = $request->input('tehsilId') == 0 ? null : $request->input('tehsilId');
        $markaz_id = $request->input('markazId') == 0 ? null : $request->input('markazId');
        $emis_code = $request->input('emisCode') == 0 ? null : $request->input('emisCode');
        $daterange = $request->input('daterange', '01/01/1970 - 12/31/9999');

        list($date_from, $date_to) = explode(' - ', $daterange);
        $received_date_from = date('Y-m-d', strtotime(str_replace('/', '-', $date_from)));
        $received_date_to = date('Y-m-d', strtotime(str_replace('/', '-', $date_to)));

        // Determine the type based on the presence of IDs
        $type = null;
        if ($markaz_id) {
            $type = 'SCHOOL';
        } elseif ($tehsil_id) {
            $type = 'ALL_MARKAZ';
        } elseif ($district_id) {
            $type = 'TEHSIL';
        } else {
            $type = 'ALL_DISTRICT';
        }

        $procedureCall = 'CALL `P_GET_DASHBOARD_LISTING`(?, ?, ?, ?, ?, ?)';

        $pdo = DB::connection('mysql')->getPdo();
        $statement = $pdo->prepare($procedureCall);

        $daterange = null;
        $emis_code = null;

        $statement->execute([$district_id, $tehsil_id, $markaz_id, $emis_code, $daterange, $type]);

        $summary = [];
        do {
            $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
            if ($rows) {
                $summary[] = $rows;
            }
        } while ($statement->nextRowset());

        $statement->closeCursor();

        $all_summaries[$type] = $summary;
        //dd($all_summaries);
        return view('report.district_report', ['all_summaries' => $all_summaries])->render();
    }

    // public function showStatDetail(Request $request)
    // {

    //     $district_id = $request->input('districtId', null);
    //     $tehsil_id = $request->input('tehsilId') == 0 ? null : $request->input('tehsilId');
    //     $markaz_id = $request->input('markazId') == 0 ? null : $request->input('markazId');
    //     $emis_code = $request->input('emisCode') == 0 ? null : $request->input('emisCode');
    //     $daterange = $request->input('daterange', '01/01/1970 - 12/31/9999');


    //     list($date_from, $date_to) = explode(' - ', $daterange);
    //     $received_date_from = date('Y-m-d', strtotime(str_replace('/', '-', $date_from)));
    //     $received_date_to = date('Y-m-d', strtotime(str_replace('/', '-', $date_to)));

    //     $types = [];
    //     if ($markaz_id) {
    //         $types[] = 'SCHOOL';
    //     }
    //     if ($tehsil_id) {
    //         $types[] = 'ALL_MARKAZ';
    //     }
    //     if ($district_id) {
    //         $types[] = 'TEHSIL';
    //     }
    //     if ($district_id) {
    //         $types[] = 'SPECIFIC_DISTRICT';
    //     }
    //     if (empty($types)) {
    //         $types[] = 'ALL_DISTRICT';
    //     }

    //     $procedureCall = 'CALL `P_GET_DASHBOARD_LISTING`(?, ?, ?, ?, ?, ?)';

    //     $pdo = DB::connection('mysql')->getPdo();
    //     $statement = $pdo->prepare($procedureCall);

    //     $daterange = null;
    //     $emis_code = null;
    //     $all_summaries = [];

    //     foreach ($types as $type) {
    //         $statement->execute([$district_id, $tehsil_id, $markaz_id, $emis_code, $daterange, $type]);

    //         $summary = [];
    //         do {
    //             $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
    //             if ($rows) {
    //                 $summary[] = $rows;
    //             }
    //         } while ($statement->nextRowset());

    //         $all_summaries[$type] = $summary;
    //     }

    //     $statement->closeCursor();
    //     //dd($all_summaries);

    //     return view('report.district_report', ['all_summaries' => $all_summaries])->render();
    // }

    // public function showStatDetail(Request $request)
    // {
    //     // Retrieve input values
    //     $district_id = $request->input('districtId', null);
    //     $tehsil_id = $request->input('tehsilId') == 0 ? null : $request->input('tehsilId');
    //     $markaz_id = $request->input('markazId') == 0 ? null : $request->input('markazId');
    //     $emis_code = $request->input('emisCode') == 0 ? null : $request->input('emisCode');
    //     $daterange = $request->input('daterange', '01/01/1970 - 12/31/9999');

    //     // Date range handling
    //     list($date_from, $date_to) = explode(' - ', $daterange);
    //     $received_date_from = date('Y-m-d', strtotime(str_replace('/', '-', $date_from)));
    //     $received_date_to = date('Y-m-d', strtotime(str_replace('/', '-', $date_to)));

    //     // Define types based on the input parameters
    //     $types = [];
    //     if ($markaz_id) {
    //         $types[] = 'SCHOOL';
    //     }
    //     if ($tehsil_id) {
    //         $types[] = 'MARKAZ';
    //     }
    //     if ($district_id) {
    //         $types[] = 'TEHSIL';
    //     }
    //     if ($district_id) {
    //         $types[] = 'SPECIFIC_DISTRICT';
    //     }
    //     if (empty($types)) {
    //         $types[] = 'ALL_DISTRICT';
    //     }

    //     // Procedure call
    //     $procedureCall = 'CALL `P_GET_DASHBOARD_LISTING`(?, ?, ?, ?, ?, ?)';

    //     $pdo = DB::connection('mysql')->getPdo();
    //     $statement = $pdo->prepare($procedureCall);

    //     $daterange = null;
    //     $emis_code = null;
    //     // Execute the procedure for each type
    //     //$all_summaries = [];
    //     foreach ($types as $type) {
    //         $statement->execute([$district_id, $tehsil_id, $markaz_id, $emis_code, $daterange, $type]);

    //         $summary = [];
    //         do {
    //             $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
    //             if ($rows) {
    //                 $summary[] = $rows;
    //             }
    //         } while ($statement->nextRowset());

    //         $all_summaries[$type] = $summary;
    //     }

    //     $statement->closeCursor();
    //     //dd($all_summaries);
    //     return view('report.district_report', ['all_summaries' => $all_summaries])->render();
    // }

    public function getTehsils($districtId)
    {
        $tehsils = Tehsil::where('t_district_idFk', $districtId)
            ->where('t_status', 1)
            ->get(['t_id', 't_name']);
        return response()->json($tehsils)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
    public function getMarkaz($tehsilId)
    {
        $markez = Markaz::select('markazes.*')
            ->join('schools', 'markazes.m_id', '=', 'schools.s_markaz_idFk')
            ->where('schools.level', 'Primary')
            ->distinct()
            ->get();
        return response()->json($markez)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
    public function getSchools($markezId)
    {
        $schools = DB::table('school_info')
            ->where('s_markaz_idFk', $markezId)
            //->where('m_status', 1)
            ->get(['id', 's_name', 's_emis_code']);
        return response()->json($schools)
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }
}
