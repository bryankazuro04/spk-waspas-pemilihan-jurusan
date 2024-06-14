<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Student;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * 
     */
    public function index() {
        $criteria = Criteria::with('subCriteria')->get();

        return view('siswa.index', compact('criteria'));
    }

    /**
     * 
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'nilai.*' => 'required|numeric'
        ]);

        $student = Student::create($request->only('name'));

        foreach ($request->nilai as $subCriteriaId => $nilai) {
            SubCriteria::where('id', $subCriteriaId)->update(['nilai' => $nilai]);
        }

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * 
     */
    public function hasil() {
        $results = $this->calculateWaspas();
        $student = Student::whereIn('id', array_keys($results))->get();

        return view('siswa.hasil', compact('student', 'results'));
    }

    /**
     * 
     */
    private function calculateWaspas() {
        $subCriteria = SubCriteria::all();
        $student = Student::all();

        $normalized = [];
        foreach($subCriteria as $sc) {
            $max = $subCriteria->where('id', $sc->id)->max('nilai');
            $min = $subCriteria->where('id', $sc->id)->min('nilai');

            foreach($student as $s) {
                if($max == $min) {
                    $normalized[$s->id][$sc->id] = 1;
                } else {
                    $normalized[$s->id][$sc->id] = ($sc->nilai - $min) / ($max - $min);
                }
            }
        }

        $results = [];
        foreach($student as $s) {
            $Qi = 0;
            $Pi = 1;

            foreach($subCriteria as $sc) {
                $Qi += $sc->bobot * $normalized[$s->id][$sc->id];
                $Pi += pow($normalized[$s->id][$sc->id], $sc->bobot);
            }

            $results[$s->id] = 0.5 * $Qi + 0.5 * $Pi;
        }

        arsort($results);
        return $results;
    }
}