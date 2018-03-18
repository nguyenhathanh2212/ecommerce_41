<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = $this->userRepository->getAllUsers();

            return view('admin.user.index', compact('users'));
        } catch (Exception $e) {
            return view('templates.admin.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->userRepository->deleteUser($id);

            return redirect()->route('admin.user.index')->with('success', trans('lang.delSuccess'));
        } catch (Exception $e) {
            return redirect()->route('admin.user.index')->with('error', trans('lang.delError'));
        }
    }

    public function paginate(Request $request)
    {
        try {
            if ($request->text) {
                $users = $this->userRepository->search($request->text);
            } else {
                $users = $this->userRepository->getAllUsers();
            }
            
            return view('admin.user.contentindex', compact('users'));
        } catch (Exception $e) {
            return trans('lang.notFound');
        }
    }

    public function setAdmin(Request $request)
    {
        try {
            $this->userRepository->changeAdmin($request->id, $request->status);
            $request->session()->flash('success', trans('lang.changeSuccess'));
        } catch (Exception $e) {
            $request->session()->flash('error', trans('lang.changeError'));
        }
    }
}
