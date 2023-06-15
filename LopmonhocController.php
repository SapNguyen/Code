<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLopMHRequest;
use App\Http\Services\LopService;
use App\Models\Lopmonhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LopmonhocController extends Controller
{
    //
    protected $lopService;
    public function __construct(LopService $lopService)
    {
        $this->lopService = $lopService;
    }
    public function create(){
        return view('admin.lop.add',[
            'title'=>'Thêm mới lớp học'
        ]);
    }
    public function postcreate(CreateLopMHRequest $request){
        //echo "thêm mới thành công";
        //dd($request->input());
        $result = $this->lopService->create($request);
        return redirect()->back();
    }

    public function list(){
        $searchName = request('searchName');
        $select = request('slnameid');
        $sort = request('slaz');
        $pag=request('slpag');
        // dd($select);
        if($sort == "za"){
        if(isset($searchName)){
            if($select == "Id"){
                $lops = DB::table('lopmonhocs')->where('id','=',$searchName)->orderBy('tenlop','DESC')->paginate($pag);
                $sorts = 2;
                $sl = 2;
                if($pag=="1"){
                    $p=1;
                }
                else{
                    $p=2;
                }
            }
            if($select == "Name"){
                $lops = DB::table('lopmonhocs')->where('tenlop','=',$searchName)->orderBy('tenlop','DESC')->paginate($pag);
                $sorts = 2;
                $sl = 3;
                if($pag=="1"){
                    $p=1;
                }
                else{
                    $p=2;
                }
            }
            if($select == "lc"){
                $lops = DB::table('lopmonhocs')->orderBy('tenlop','DESC')->paginate($pag);
                $sorts = 2;
                $sl = 1;
                if($pag=="1"){
                    $p=1;
                }
                else{
                    $p=2;
                }
             }
        }
        else{
            $lops = DB::table('lopmonhocs')->orderBy('tenlop','DESC')->paginate($pag);
            $sorts = 2;
            $sl = 1;
            if($pag=="1"){
                $p=1;
            }
            else{
                $p=2;
            }
            
        }
        return view('admin.lop.list',[
            'title'=>'Danh sách lớp học',
            'lops'=> $lops,
            'sorts'=> $sorts,
            'searchName'=>$searchName,
            'slnameid'=>$select,
            'slaz'=>$sort,
            'sl'=>$sl,
            'p'=>$p,
            'slpag'=>$pag
        ]);
        }
        elseif($sort == "az"){
            if(isset($searchName)){
                if($select == "Id"){
                    $lops = DB::table('lopmonhocs')->where('id','=',$searchName)->orderBy('tenlop','ASC')->paginate($pag);
                    $sorts = 1;
                    $sl = 2;
                    if($pag=="1"){
                        $p=1;
                    }
                    else{
                        $p=2;
                    }
                }
                if($select == "Name"){
                    $lops = DB::table('lopmonhocs')->where('tenlop','=',$searchName)->orderBy('tenlop','ASC')->paginate($pag);
                    $sorts = 1;
                    $sl = 3;
                    if($pag=="1"){
                        $p=1;
                    }
                    else{
                        $p=2;
                    }
                }
                if($select == "lc"){
                    $lops = DB::table('lopmonhocs')->orderBy('tenlop','ASC')->paginate($pag);
                    $sorts = 1;
                    $sl = 1;
                    if($pag=="1"){
                        $p=1;
                    }
                    else{
                        $p=2;
                    }
                 }
            }
            else{
                $lops = DB::table('lopmonhocs')->orderBy('tenlop','ASC')->Paginate($pag);
                $sorts = 1;
                $sl=1;
                if($pag=="1"){
                    $p=1;
                }
                else{
                    $p=2;
                }
                
            }
            return view('admin.lop.list',[
                'title'=>'Danh sách lớp học',
                'lops'=> $lops,
                'sorts'=> $sorts,
                'searchName'=>$searchName,
                'slnameid'=>$select,
                'slaz'=>$sort,
                'sl'=>$sl,
                'p'=>$p,
                'slpag'=>$pag
            ]);
        }
        else{
            $lops = DB::table('lopmonhocs')->orderBy('tenlop','ASC')->paginate(1);
            $sorts = 1;
            $sl=1;
            $p=1;
        }
        return view('admin.lop.list',[
            'title'=>'Danh sách lớp học',
            'lops'=> $lops,
            'sorts'=> $sorts,
            'searchName'=>$searchName,
            'slnameid'=>$select,
            'slaz'=>$sort,
            'sl'=>$sl,
            'p'=>$p,
            'slpag'=>$pag
        ]);
    }
    public function edit(Lopmonhoc $lop){
        return view('admin.lop.edit',[
            'title'=>'Cập nhật thông tin lớp học',
            'lop'=>$lop
        ]);
    }
    public function postedit(Lopmonhoc $lop, CreateLopMHRequest $request){
       $result = $this->lopService->edit($lop,$request);
       return redirect()->back();
    }
    public function delete(Request $request){
        $result = $this->lopService->delete($request);
        if($result){
            return response()->json([
            'error'=>'false',
            'message'=>'Xóa lớp học thành công'
        ]);
        }
        return response()->json([
           'error'=>'true'
        ]);

    }
}
