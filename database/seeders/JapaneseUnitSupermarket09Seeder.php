<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Enums\ExerciseType;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class JapaneseUnitSupermarket09Seeder extends Seeder
{
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();
        $chapter = Chapter::where('language_id', $language->id)->where('chapter_key', ChapterKey::Supermarket)->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 9: Frozen & Packaged Food'],
            ['order_number' => 9]
        );

        foreach ($this->lessons() as $lessonData) {
            $lesson = Lesson::firstOrCreate(
                ['unit_id' => $unit->id, 'title' => $lessonData['title']],
                ['order_number' => $lessonData['order']]
            );

            foreach ($lessonData['exercises'] as $index => $exerciseData) {
                Exercise::updateOrCreate(
                    ['lesson_id' => $lesson->id, 'order_number' => $index + 1],
                    ['type' => ExerciseType::from($exerciseData['type']), 'data' => $exerciseData['data']]
                );
            }
        }
    }

    private function lessons(): array
    {
        return [
            [
                'title' => 'Lesson 1: Frozen Vegetables & Fruits',
                'order' => 1,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '冷凍グリーンピース',
                            'options' => [
                                ['text' => '冷凍グリーンピース', 'image' => '/images/exercises/reitou-gurinpiisu.png'],
                                ['text' => '冷凍コーン', 'image' => '/images/exercises/reitou-kon.png'],
                                ['text' => '冷凍ほうれん草', 'image' => '/images/exercises/reitou-hourensou.png'],
                                ['text' => '冷凍ベリー', 'image' => '/images/exercises/reitou-beri.png'],
                            ],
                            'correct_answer' => '冷凍グリーンピース',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['保存されています', '保存している', '保存された', '保存します'],
                            'sentence' => 'これらの冷凍野菜は冷凍庫で____。',
                            'correct_answer' => '保存されています',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['買いました', '冷凍の', '昨日', '私は', 'イチゴを'],
                            'correct_order' => ['私は', '昨日', '冷凍の', 'イチゴを', '買いました'],
                            'target_sentence' => '私は昨日冷凍のイチゴを買いました',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '冷凍グリーンピースを冷凍庫に入れてください',
                                '新鮮なグリーンピースをかごに入れてください',
                                '冷凍コーンをカウンターに持っていってください',
                                '冷凍フルーツを棚に置いたままにしてください',
                            ],
                            'audio_url' => '/audio/exercises/reitou-gurinpiisu-wo-reitouko-ni-irete-kudasai.mp3',
                            'audio_text' => '冷凍グリーンピースを冷凍庫に入れてください',
                            'correct_answer' => '冷凍グリーンピースを冷凍庫に入れてください',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'word' => '冷凍の',
                            'options' => [
                                '保存するために極低温に保たれている',
                                '高温で調理された',
                                '農場から届いた新鮮なもの',
                                '一晩中外に置かれた',
                            ],
                            'correct_answer' => '保存するために極低温に保たれている',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['重さは', '重い', '重く', '重さの'],
                            'sentence' => 'この冷凍コーンの袋の____2キログラムです。',
                            'correct_answer' => '重さは',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 2: Frozen Meat & Fish',
                'order' => 2,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '冷凍鶏肉',
                            'options' => [
                                ['text' => '冷凍鶏肉', 'image' => '/images/exercises/reitou-toriniku.png'],
                                ['text' => '冷凍牛肉', 'image' => '/images/exercises/reitou-gyuuniku.png'],
                                ['text' => '冷凍エビ', 'image' => '/images/exercises/reitou-ebi.png'],
                                ['text' => '冷凍サーモン', 'image' => '/images/exercises/reitou-samon.png'],
                            ],
                            'correct_answer' => '冷凍鶏肉',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['解凍する', '解凍します', '解凍している', '解凍した'],
                            'sentence' => '調理する前に冷凍魚を____べきです。',
                            'correct_answer' => '解凍する',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['冷凍して', 'ください', '肉を', '今日'],
                            'correct_order' => ['今日', '肉を', '冷凍して', 'ください'],
                            'target_sentence' => '今日肉を冷凍してください',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['は', '冷凍エビ', '特売中です'],
                            'correct_order' => ['冷凍エビ', 'は', '特売中です'],
                            'target_sentence' => '冷凍エビは特売中です',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'この冷凍牛肉は特売中です',
                                'この冷凍鶏肉は高いです',
                                'この新鮮な魚は小さすぎます',
                                'この缶詰の肉は辛いです',
                            ],
                            'audio_url' => '/audio/exercises/kono-reitou-gyuuniku-wa-tokubaichuu-desu.mp3',
                            'audio_text' => 'この冷凍牛肉は特売中です',
                            'correct_answer' => 'この冷凍牛肉は特売中です',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => ['より長く新鮮さを保つため', 'より速く調理するため', 'より安くするため', '色を変えるため'],
                            'question' => 'なぜ肉を冷凍するのですか？',
                            'correct_answer' => 'より長く新鮮さを保つため',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 3: Canned Goods',
                'order' => 3,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '缶詰の豆',
                            'options' => [
                                ['text' => '缶詰の豆', 'image' => '/images/exercises/kanzume-no-mame.png'],
                                ['text' => '缶詰のコーン', 'image' => '/images/exercises/kanzume-no-kon.png'],
                                ['text' => '缶詰のトマト', 'image' => '/images/exercises/kanzume-no-tomato.png'],
                                ['text' => '缶詰のスープ', 'image' => '/images/exercises/kanzume-no-supu.png'],
                            ],
                            'correct_answer' => '缶詰の豆',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['缶切り', '缶切りの', '缶を開ける', '開ける缶'],
                            'sentence' => '____で缶を開けてください。',
                            'correct_answer' => '缶切り',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['缶詰の', 'この', 'スープは', '美味しいです'],
                            'correct_order' => ['この', '缶詰の', 'スープは', '美味しいです'],
                            'target_sentence' => 'この缶詰のスープは美味しいです',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'これらの缶詰のトマトは新鮮なものより安いです',
                                'これらの缶詰の豆は新鮮なものより高いです',
                                'これらの新鮮なトマトは缶詰のものより安いです',
                                'これらの缶詰のトマトは新鮮なものより重いです',
                            ],
                            'audio_url' => '/audio/exercises/korera-kanzume-no-tomato-wa-shinsen-na-mono-yori-yasui-desu.mp3',
                            'audio_text' => 'これらの缶詰のトマトは新鮮なものより安いです',
                            'correct_answer' => 'これらの缶詰のトマトは新鮮なものより安いです',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'word' => '缶詰の',
                            'options' => [
                                '保存のために金属容器に密封された',
                                '油で調理された',
                                '完全に冷凍された',
                                '包装なしで販売される',
                            ],
                            'correct_answer' => '保存のために金属容器に密封された',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => ['豆', '新鮮なレタス', 'アイスクリーム', 'パン'],
                            'question' => '通常、缶に入って売られている食べ物はどれですか？',
                            'correct_answer' => '豆',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 4: Reading Expiry Dates',
                'order' => 4,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '賞味期限',
                            'options' => [
                                ['text' => '賞味期限', 'image' => '/images/exercises/shoumi-kigen.png'],
                                ['text' => '美味しく食べられる期限', 'image' => '/images/exercises/oishiku-taberareru-kigen.png'],
                                ['text' => '消費期限', 'image' => '/images/exercises/shouhi-kigen.png'],
                                ['text' => '製造日', 'image' => '/images/exercises/seizoubi.png'],
                            ],
                            'correct_answer' => '賞味期限',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['前に', '後に', '間に', '以来'],
                            'sentence' => '食品を買う____必ず賞味期限を確認してください。',
                            'correct_answer' => '前に',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['書いてあります', '賞味期限は', 'ラベルに'],
                            'correct_order' => ['賞味期限は', 'ラベルに', '書いてあります'],
                            'target_sentence' => '賞味期限はラベルに書いてあります',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'この牛乳は来週賞味期限が切れます',
                                'この牛乳は先月賞味期限が切れました',
                                'このパンは今日賞味期限が切れます',
                                'このジュースは賞味期限がありません',
                            ],
                            'audio_url' => '/audio/exercises/kono-gyuunyuu-wa-raishuu-shoumi-kigen-ga-kiremasu.mp3',
                            'audio_text' => 'この牛乳は来週賞味期限が切れます',
                            'correct_answer' => 'この牛乳は来週賞味期限が切れます',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '賞味期限が切れた食品を食べないでください',
                                '賞味期限が切れた後でも食べられます',
                                '買う前に必ず食べてください',
                                '賞味期限の前に価格を確認してください',
                            ],
                            'audio_url' => '/audio/exercises/shoumi-kigen-ga-kireta-shokuhin-wo-tabenaide-kudasai.mp3',
                            'audio_text' => '賞味期限が切れた食品を食べないでください',
                            'correct_answer' => '賞味期限が切れた食品を食べないでください',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'word' => '賞味期限',
                            'options' => ['食品を使用すべきでない日付', '食品が作られた日付', '食品の価格', '食品の重さ'],
                            'correct_answer' => '食品を使用すべきでない日付',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 5: Storing Frozen & Packaged Food',
                'order' => 5,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '冷凍庫',
                            'options' => [
                                ['text' => '冷凍庫', 'image' => '/images/exercises/reitouko.png'],
                                ['text' => '冷蔵庫', 'image' => '/images/exercises/reizouko.png'],
                                ['text' => 'パントリー', 'image' => '/images/exercises/pantori.png'],
                                ['text' => '戸棚', 'image' => '/images/exercises/todana.png'],
                            ],
                            'correct_answer' => '冷凍庫',
                        ],
                    ],
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '密閉容器',
                            'options' => [
                                ['text' => '密閉容器', 'image' => '/images/exercises/mippei-youki.png'],
                                ['text' => 'ビニール袋', 'image' => '/images/exercises/biniiru-bukuro.png'],
                                ['text' => '紙箱', 'image' => '/images/exercises/kamibako.png'],
                                ['text' => 'ガラス瓶', 'image' => '/images/exercises/garasu-bin.png'],
                            ],
                            'correct_answer' => '密閉容器',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['以下に', '以上に', '間に', '横に'],
                            'sentence' => '冷凍食品はマイナス18度____保たなければなりません。',
                            'correct_answer' => '以下に',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['涼しい', '缶は', 'パントリーに', '保管してください'],
                            'correct_order' => ['缶は', '涼しい', 'パントリーに', '保管してください'],
                            'target_sentence' => '缶は涼しいパントリーに保管してください',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '包装食品は乾燥した場所に保管してください',
                                '包装食品を太陽の下に保管してください',
                                '冷凍食品を冷凍庫から出してください',
                                '缶詰食品を水に保管してください',
                            ],
                            'audio_url' => '/audio/exercises/housou-shokuhin-wa-kansou-shita-basho-ni-hokan-shite-kudasai.mp3',
                            'audio_text' => '包装食品は乾燥した場所に保管してください',
                            'correct_answer' => '包装食品は乾燥した場所に保管してください',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => ['冷凍庫の中', 'パントリーの中', 'カウンターの上', '紙袋の中'],
                            'question' => '冷凍食品はどこに保管すべきですか？',
                            'correct_answer' => '冷凍庫の中',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 6: Packaged Snacks & Ready Meals',
                'order' => 6,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '惣菜',
                            'options' => [
                                ['text' => '惣菜', 'image' => '/images/exercises/souzai.png'],
                                ['text' => '冷凍ピザ', 'image' => '/images/exercises/reitou-piza.png'],
                                ['text' => 'インスタントラーメン', 'image' => '/images/exercises/insutanto-ramen.png'],
                                ['text' => '袋入りポテトチップス', 'image' => '/images/exercises/fukuro-iri-poteto-chippusu.png'],
                            ],
                            'correct_answer' => '惣菜',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['かかります', 'かかる', 'かかっている', 'かかった'],
                            'sentence' => 'この惣菜は調理にたった3分しか____。',
                            'correct_answer' => 'かかりません',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => ['より不健康', '最も健康的', '健康的', '健康'],
                            'sentence' => 'これらの袋入りスナックは手作りのもの____です。',
                            'correct_answer' => 'より不健康',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => ['加熱して', '10分間', '冷凍ピザを', 'ください'],
                            'correct_order' => ['冷凍ピザを', '10分間', '加熱して', 'ください'],
                            'target_sentence' => '冷凍ピザを10分間加熱してください',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'このインスタントラーメンはすぐに準備できます',
                                'この新鮮なサラダは準備に1時間かかります',
                                'この冷凍ピザは調理できません',
                                'この缶詰のスープは最初に冷凍しなければなりません',
                            ],
                            'audio_url' => '/audio/exercises/kono-insutanto-ramen-wa-sugu-ni-junbi-dekimasu.mp3',
                            'audio_text' => 'このインスタントラーメンはすぐに準備できます',
                            'correct_answer' => 'このインスタントラーメンはすぐに準備できます',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'word' => '惣菜',
                            'options' => [
                                'すでに準備されていて、ほとんど調理が必要ない食事',
                                '生の食材から調理する食事',
                                'レストランでのみ食べる食事',
                                '飲み物',
                            ],
                            'correct_answer' => 'すでに準備されていて、ほとんど調理が必要ない食事',
                        ],
                    ],
                ],
            ],
        ];
    }
}
