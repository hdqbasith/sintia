<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Role;
use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class Migrasi extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:data-standar-get');
    }
    public function index(): Response
    {
        return Inertia::render('Migrasi/Index', [
            'users' => \App\Models\Olduser::take(10)->get(),
            'message' => session()->has('message') ? session()->get("message") : null
        ]);
    }
    public function user(): RedirectResponse
    {
        $old_users = \App\Models\Olduser::get();
        $data = [];
        $pass = Hash::make('fastabiqu');
        foreach ($old_users as $user) {
            $data[] = [
                'name' => $user->username,
                'email' => $user->username . '@idary.gusjigang.id',
                'password' => $pass,
                'id' => Str::uuid()->toString(),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ];
        }
        try {
            \App\Models\User::insertOrIgnore($data);
            session()->flash('message', ['type' => 'success', 'msg' => 'Migrasi user berhasil']);
        } catch (\Exception $e) {
            session()->flash('message', ['type' => 'error', 'msg' => 'Migrasi user gagal']);
        }
        return redirect()->back();
    }
    public function role(): RedirectResponse
    {
        $user = \App\Models\User::get();

        $developer = Role::findOrCreate('developer');
        $admin = Role::findOrCreate('admin');
        $panitia_ppdb = Role::findOrCreate('panitia-ppdb');
        $panitia_ulangan = Role::findOrCreate('panitia-ulangan');
        $teacher = Role::findOrCreate('teacher');
        $student = Role::findOrCreate('student');
        $alumni = Role::findOrCreate('alumni');
        $applicant = Role::findOrCreate('applicant');
        $guest = Role::findOrCreate('guest');
        $admin_bantu = Role::findOrCreate('admin-bantu');
        try {
            foreach ($user as $u) {
                $u->assignRole($guest);
            }
            session()->flash('message', ['type' => 'success', 'msg' => 'Role sudah dibuat']);
        } catch (\Exception $e) {
            session()->flash('message', ['type' => 'error', 'msg' => 'Pembuatan role gagal']);
        }
        return redirect()->back();
        // 'users'=>\App\Models\Datasiswa::with('user')->wheres_akun(auth()->user()->id)->get()
        // $cek=\App\Models\StudentPersonal::find('84311c5a-0c72-4863-97e7-58136f5db190');
        // $cek = \App\Models\StudentPersonal::with('authuser')->find('84311c5a-0c72-4863-97e7-58136f5db190');
        // dd($cek);
        // return Inertia::render('Migrasi/Index', [
        // 'users'=>\App\Models\StudentPersonal::with('authuser')->wheres_akun(auth()->user()->id)->get()

        //     'users' => $cek
        // ]);
    }
    public function permission(): RedirectResponse
    {
        $p1 = Permission::findByName('data-standar-get');
        $p2 = Permission::findByName('data-standar-insert');
        $p3 = Permission::findByName('data-standar-delete');

        $role = Role::all();

        try {
            foreach ($role as $r) {
                $r->givePermissionTo([$p1, $p2, $p3]);
            }
            session()->flash('message', ['type' => 'success', 'msg' => 'Permission sudah dibuat']);
        } catch (\Exception $e) {
            session()->flash('message', ['type' => 'error', 'msg' => 'Pembuatan permission gagal']);
        }
        return redirect()->back();
    }
    public function datasiswa(): RedirectResponse
    {
        $biostudent = DB::table('bio__students')->select('bio__students.*','auth__users.id')->join('auth__users', 'name', '=', 's_nisn')->get();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        foreach ($biostudent as $b) {
            $b->s_akun=$b->id;
            unset($b->id, $b->created, $b->updated, $b->createdby, $b->updatedby);
            \App\Models\StudentPersonal::insertOrIgnore((array)$b);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('bio__father')->select('bio__father.*','id')->join('bio__students', 'ak_akun', '=', 's_akun')->join('auth__users', 'name', '=', 's_nisn')->orderBy('ak_akun')->chunk(100, function (Collection $c) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $data=[];
            foreach ($c as $b) {
                $b->ak_akun=$b->id;
                unset($b->id);
                $data[]=(array)$b;
            }
            \App\Models\StudentFather::insertOrIgnore($data);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });

        DB::table('bio__mother')->select('bio__mother.*','id')->join('bio__students', 'ik_akun', '=', 's_akun')->join('auth__users', 'name', '=', 's_nisn')->orderBy('ik_akun')->chunk(100, function (Collection $c) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $data=[];
            foreach ($c as $b) {
                $b->ik_akun=$b->id;
                unset($b->id);
                $data[]=(array)$b;
            }
            \App\Models\StudentMother::insertOrIgnore($data);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });

        DB::table('bio__guardian')->select('bio__guardian.*','id')->join('bio__students', 'wali_akun', '=', 's_akun')->join('auth__users', 'name', '=', 's_nisn')->orderBy('wali_akun')->chunk(100, function (Collection $c) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $data=[];
            foreach ($c as $b) {
                $b->wali_akun=$b->id;
                unset($b->id);
                $data[]=(array)$b;
            }
            \App\Models\StudentGuardian::insertOrIgnore($data);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });

        DB::table('bio__domicile')->select('bio__domicile.*','id')->join('bio__students', 'm_akun', '=', 's_akun')->join('auth__users', 'name', '=', 's_nisn')->orderBy('m_akun')->chunk(100, function (Collection $c) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $data=[];
            foreach ($c as $b) {
                $b->m_akun=$b->id;
                unset($b->id);
                $data[]=(array)$b;
            }
            \App\Models\StudentDomicile::insertOrIgnore($data);
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });
        
        
        return redirect()->back();
    }
    public function exportxls()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
