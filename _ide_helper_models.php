<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AuthUser
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|AuthUser role($roles, $guard = null)
 * @mixin Eloquent
 */
	class AuthUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarCheckup
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $target
 * @property string $satuan
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarCheckup whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarCheckup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarDiagnosis
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $diagnosis
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarDiagnosis whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarDiagnosis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarKeluhan
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $anamnesa
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereAnamnesa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarKeluhan whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarKeluhan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarObat
 *
 * @property integer $id
 * @property string $created_by
 * @property string $nama
 * @property string $satuan
 * @property integer $stok
 * @property integer $hargabeli
 * @property integer $hargajual
 * @property string $expired
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereHargabeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereHargajual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarObat whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarObat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarOdontogram
 *
 * @property integer $id
 * @property string $created_by
 * @property string $link_gambar
 * @property string $kode
 * @property string $arti
 * @property string $catatan
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereArti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereLinkGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarOdontogram whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarOdontogram extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarPasien
 *
 * @property integer $id
 * @property string $created_by
 * @property string $nomor_rm
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $nik
 * @property string $gender
 * @property string $pekerjaan
 * @property string $alamat
 * @property string $hp
 * @property string $goldar
 * @property string $akun
 * @property integer $klinik
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @property PasienAntrean[] $pasienAntreans
 * @property PasienRecord[] $pasienRecords
 * @property PasienTransaksi[] $pasienTransakses
 * @property string|null $bpjs
 * @property-read int|null $pasien_antreans_count
 * @property-read int|null $pasien_records_count
 * @property-read int|null $pasien_transakses_count
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereAkun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereBpjs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereGoldar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereNomorRm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarPasien whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarPasien extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\DaftarTerapi
 *
 * @property integer $id
 * @property string $created_by
 * @property string $kode
 * @property string $terapi
 * @property string $biaya
 * @property string $created_at
 * @property string $updated_at
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi query()
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereBiaya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereTerapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DaftarTerapi whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class DaftarTerapi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasienAntrean
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $nomor
 * @property string $kehadiran
 * @property string $booking_mulai
 * @property string $booking_selesai
 * @property integer $klinik
 * @property boolean $online
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereBookingMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereBookingSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereKehadiran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienAntrean whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class PasienAntrean extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasienCheckup
 *
 * @property int $id
 * @property int $pasien
 * @property string $tabel
 * @property int|null $kode
 * @property int|null $keterangan
 * @property int $klinik
 * @property string|null $admin
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienCheckup whereUpdatedAt($value)
 */
	class PasienCheckup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasienOdontogram
 *
 * @property int $id
 * @property int|null $pasien
 * @property int|null $number
 * @property int|null $left
 * @property int|null $top
 * @property int|null $right
 * @property int|null $bottom
 * @property int|null $condition
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereBottom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property array|null $middle
 * @method static \Illuminate\Database\Eloquent\Builder|PasienOdontogram whereMiddle($value)
 * @mixin Eloquent
 * @property-read \App\Models\DaftarOdontogram|null $daftarOdontogram
 */
	class PasienOdontogram extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasienRecord
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $tabel
 * @property integer $kode
 * @property integer $keterangan
 * @property integer $klinik
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKlinik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $subjective
 * @property string|null $objective
 * @property int|null $assessment
 * @property int|null $planning
 * @property string|null $detail
 * @property string|null $prescription
 * @property int|null $cost
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereAssessment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereObjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePlanning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord wherePrescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienRecord whereSubjective($value)
 */
	class PasienRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasienTransaksi
 *
 * @property integer $id
 * @property integer $pasien
 * @property string $admin
 * @property string $tabel
 * @property integer $kode
 * @property integer $tarif
 * @property boolean $kuantitas
 * @property integer $harga
 * @property string $created_at
 * @property string $updated_at
 * @property DaftarPasien $daftarPasien
 * @property AuthUser $authUser
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereKuantitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi wherePasien($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereTabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereTarif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasienTransaksi whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class PasienTransaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PersonalAccessToken
 *
 * @property integer $id
 * @property string $tokenable_type
 * @property integer $tokenable_id
 * @property string $name
 * @property string $token
 * @property string $abilities
 * @property string $last_used_at
 * @property string $expires_at
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PersonalAccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SideMenu
 *
 * @property int $id
 * @property int $parent
 * @property int $order
 * @property string $name
 * @property string $link
 * @property string $level
 * @property int $active
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SideMenu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TelescopeEntriesTag
 *
 * @property string $entry_uuid
 * @property string $tag
 * @property TelescopeEntry $telescopeEntry
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereEntryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereTag($value)
 * @mixin \Eloquent
 */
	class TelescopeEntriesTag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TelescopeEntry
 *
 * @property integer $sequence
 * @property string $uuid
 * @property string $batch_id
 * @property string $family_hash
 * @property boolean $should_display_on_index
 * @property string $type
 * @property string $content
 * @property string $created_at
 * @property TelescopeEntriesTag[] $telescopeEntriesTags
 * @property-read int|null $telescope_entries_tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereFamilyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereShouldDisplayOnIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereUuid($value)
 * @mixin \Eloquent
 */
	class TelescopeEntry extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property string $key
 * @property string $val
 * @property string|null $user
 * @property string|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereVal($value)
 * @property string $content
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereContent($value)
 * @mixin Eloquent
 */
	class UserSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Wilayah
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Wilayah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wilayah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wilayah query()
 * @mixin \Eloquent
 */
	class Wilayah extends \Eloquent {}
}

