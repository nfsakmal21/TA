<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\KknModel;
use App\Models\KpModel;
use App\Models\TaModel;
use App\Models\LombaModel;
use App\Models\MbkmModel;
use App\Models\PkmModel;
use App\Models\PesanModel;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard(){
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1){
            $data['TotalAdmin'] = User::getTotalUser(1);
            $data['TotalDosen'] = User::getTotalUser(2);
            $data['TotalMahasiswa'] = User::getTotalUser(3);
            
            $data['TotalKkn']=KknModel::getTotalKkn();
            $data['TotalKp']=KpModel::getTotalKp();
            $data['TotalTa']=TaModel::getTotalTa();
            $data['TotalLomba']=LombaModel::getTotalLomba();
            $data['TotalMbkm']=MbkmModel::getTotalMbkm();
            $data['TotalPkm']=PkmModel::getTotalPkm();
            return view('admin.dashboard', $data);
        }
    
        else if(Auth::user()->user_type == 2){
            $data['TotalKkn']=KknModel::getTotalKkn();
            $data['TotalKp']=KpModel::getTotalKp();
            $data['TotalTa']=TaModel::getTotalTa();
            $data['TotalLomba']=LombaModel::getTotalLomba();
            $data['TotalMbkm']=MbkmModel::getTotalMbkm();
            $data['TotalPkm']=PkmModel::getTotalPkm();
            return view('dosen.dashboard', $data);
        }
    
        else if(Auth::user()->user_type == 3){
            // $quotes = [
            //     "We cannot solve problems with the kind of thinking we employed when we came up with them.",
            //     "Learn as if you will live forever, live like you will die tomorrow.",
            //     "Stay away from those people who try to disparage your ambitions. Small minds will always do that, but great minds will give you a feeling that you can become great too.",
            //     "When you give joy to other people, you get more joy in return. You should give a good thought to the happiness that you can give out.",
            //     "When you change your thoughts, remember to also change your world.",
            //     "It is only when we take chances that our lives improve. The initial and the most difficult risk we need to take is to become honest.",
            //     "Nature has given us all the pieces required to achieve exceptional wellness and health, but has left it to us to put these pieces together.",
            //     "Success is not final; failure is not fatal: It is the courage to continue that counts.",
            //     "It is better to fail in originality than to succeed in imitation.",
            //     "The road to success and the road to failure are almost exactly the same",
            //     "Success usually comes to those who are too busy to be looking for it.",
            //     "Develop success from failures. Discouragement and failure are two of the surest stepping stones to success.",
            //     "Nothing in the world can take the place of persistence. Talent will not; nothing is more common than unsuccessful men with talent. Genius will not; unrewarded genius is almost a proverb. Education will not; the world is full of educated derelicts. The slogan ‘Press On’ has solved and always will solve the problems of the human race.",
            //     "There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind.",
            //     "Success is peace of mind, which is a direct result of self-satisfaction in knowing you made the effort to become the best of which you are capable.",
            //     "I never dreamed about success. I worked for it.",
            //     "Success is getting what you want; happiness is wanting what you get.",
            //     "The pessimist sees difficulty in every opportunity. The optimist sees opportunity in every difficulty.",
            //     "Don’t let yesterday take up too much of today.",
            //     "If you are working on something that you really care about, you don’t have to be pushed. The vision pulls you.",
            //     "Experience is a hard teacher because she gives the test first, the lesson afterward.",
            //     "To know how much there is to know is the beginning of learning to live.",
            //     "Goal setting is the secret to a compelling future.",
            //     "Concentrate all your thoughts upon the work in hand. The sun’s rays do not burn until brought to a focus.",
            //     "Either you run the day or the day runs you.",
            //     "I’m a great believer in luck, and I find the harder I work, the more I have of it.",
            //     "When we strive to become better than we are, everything around us becomes better too.",
            //     "Opportunity is missed by most people because it is dressed in overalls and looks like work.",
            //     "Setting goals is the first step in turning the invisible into the visible.",
            //     "Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work. And the only way to do great work is to love what you do. If you haven’t found it yet, keep looking. Don’t settle. As with all matters of the heart, you’ll know when you find it.",
            //     "You’ve got to get up every morning with determination if you’re going to go to bed with satisfaction",
            // ];
            // $penulis = [
            //     "Albert Einstein",
            //     "Mahatma Gandhi",
            //     "Mark Twain",
            //     "Eleanor Roosevelt",
            //     "Norman Vincent Peale",
            //     "Walter Anderson",
            //     "Diane McLaren",
            //     "Winston Churchill",
            //     "Herman Melville",
            //     "Colin R. Davis",
            //     "Henry David Thoreau",
            //     "Dale Carnegie",
            //     "Calvin Coolidge",
            //     "QMister Rogers",
            //     "John Wooden",
            //     "Estée Lauder",
            //     "W. P. Kinsella",
            //     "Winston Churchill",
            //     "Will Rogers",
            //     "Steve Jobs",
            //     "Vernon Sanders Law",
            //     "Dorothy West",
            //     "Tony Robbins",
            //     "Alexander Graham Bell",
            //     "Jim Rohn",
            //     "Thomas Jefferson",
            //     "Paulo Coelho",
            //     "Thomas Edison",
            //     "Tony Robbins",
            //     "Steve Jobs",
            //     "George Lorimer",
            // ];
            // $tglskrg = Carbon::now()->timezone('Asia/Jakarta');
            // $hari = $tglskrg->format('d');
            // $data['quots'] = $quotes[$hari-1];
            // $data['penulis'] = $penulis[$hari-1];
            $data['getRecord'] = PesanModel::getRecord();
            return view('mahasiswa.dashboard', $data);
        }  
    }
}
