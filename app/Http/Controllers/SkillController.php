<?php
  
namespace App\Http\Controllers;
  
use App\Skill;
use Illuminate\Http\Request;
  
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::latest()->paginate(5);
  
        return view('skill.index',compact('skill'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
            
        ]);
  
        Skill::create($request->all());
   
        return redirect()->route('skill.index')
                        ->with('success','Skill created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $Skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('skill.show',compact('skill'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $Skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit',compact('skill'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $Skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required',
            
        ]);
  
        $skill->update($request->all());
  
        return redirect()->route('skill.index')
                        ->with('success','Skill updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $Skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
  
        return redirect()->route('skill.index')
                        ->with('success','Skill deleted successfully');
    }
}