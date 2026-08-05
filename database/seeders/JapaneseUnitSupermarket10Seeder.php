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

class JapaneseUnitSupermarket10Seeder extends Seeder
{
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();
        $chapter = Chapter::where('language_id', $language->id)->where('chapter_key', ChapterKey::Supermarket)->firstOrFail();

        $unit = Unit::firstOrCreate(
            ['chapter_id' => $chapter->id, 'title' => 'Unit 10: Returns & Exchanges'],
            ['order_number' => 10]
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
                'title' => 'Lesson 1: Returning a Faulty Item',
                'order' => 1,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '不良品',
                            'options' => [
                                [
                                    'text' => '不良品',
                                    'image' => '/images/exercises/furyouhin.png',
                                ],
                                [
                                    'text' => '完璧',
                                    'image' => '/images/exercises/kanpeki.png',
                                ],
                                [
                                    'text' => '新品',
                                    'image' => '/images/exercises/shinpin.png',
                                ],
                                [
                                    'text' => '清潔',
                                    'image' => '/images/exercises/seiketsu.png',
                                ],
                            ],
                            'correct_answer' => '不良品',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                'つきません',
                                'つきます',
                                'つけません',
                                'つけない',
                            ],
                            'sentence' => 'このミキサーは壊れています。電源が____。',
                            'correct_answer' => 'つきません',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                '不良品です',
                                'この',
                                '商品は',
                            ],
                            'correct_order' => [
                                'この',
                                '商品は',
                                '不良品です',
                            ],
                            'target_sentence' => 'この商品は不良品です',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '破損しているので、これを返品したいです',
                                '今日これを買いたいです',
                                'この製品が大好きです',
                                'これは素晴らしい贈り物です',
                            ],
                            'audio_url' => '/audio/exercises/hason-shiteiru-node-kore-wo-henpin-shitai-desu.mp3',
                            'audio_text' => '破損しているので、これを返品したいです',
                            'correct_answer' => '破損しているので、これを返品したいです',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                '不良品だから',
                                '大きすぎるから',
                                '贈り物だから',
                                '彼がそれを気に入っているから',
                            ],
                            'question' => 'なぜ顧客はトースターを返品するのですか？',
                            'correct_answer' => '不良品だから',
                        ],
                    ],
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '破損した',
                            'options' => [
                                [
                                    'text' => '破損した',
                                    'image' => '/images/exercises/hason-shita.png',
                                ],
                                [
                                    'text' => '新品',
                                    'image' => '/images/exercises/shinpin.png',
                                ],
                                [
                                    'text' => '新鮮',
                                    'image' => '/images/exercises/shinsen.png',
                                ],
                                [
                                    'text' => '完璧',
                                    'image' => '/images/exercises/kanpeki.png',
                                ],
                            ],
                            'correct_answer' => '破損した',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 2: Requesting a Refund',
                'order' => 2,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '返金',
                            'options' => [
                                [
                                    'text' => '返金',
                                    'image' => '/images/exercises/henkin.png',
                                ],
                                [
                                    'text' => '割引',
                                    'image' => '/images/exercises/waribiki.png',
                                ],
                                [
                                    'text' => 'クーポン',
                                    'image' => '/images/exercises/kupon.png',
                                ],
                                [
                                    'text' => 'レシート',
                                    'image' => '/images/exercises/reshito.png',
                                ],
                            ],
                            'correct_answer' => '返金',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '返金',
                                '返金します',
                                '返金している',
                                '返金した',
                            ],
                            'sentence' => '____をお願いします。',
                            'correct_answer' => '返金',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                '返して',
                                'お金を',
                                'もらえますか',
                            ],
                            'correct_order' => [
                                'お金を',
                                '返して',
                                'もらえますか',
                            ],
                            'target_sentence' => 'お金を返してもらえますか',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '返金をリクエストしたいのですが',
                                'このシャツを買いたいのですが',
                                'もっと大きいサイズが欲しいです',
                                '買い物袋が必要です',
                            ],
                            'audio_url' => '/audio/exercises/henkin-wo-rikuesuto-shitai-no-desu-ga.mp3',
                            'audio_text' => '返金をリクエストしたいのですが',
                            'correct_answer' => '返金をリクエストしたいのですが',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'word' => '返金',
                            'options' => [
                                '顧客に返されるお金',
                                '新商品の割引',
                                '別の商品との交換',
                                '無料の贈り物',
                            ],
                            'correct_answer' => '顧客に返されるお金',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '返金',
                                '割引',
                                'クーポン',
                                '袋',
                            ],
                            'sentence' => '____を受けるにはレシートが必要です。',
                            'correct_answer' => '返金',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 3: Exchanging for a Different Size',
                'order' => 3,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '交換',
                            'options' => [
                                [
                                    'text' => '交換',
                                    'image' => '/images/exercises/koukan.png',
                                ],
                                [
                                    'text' => '返金',
                                    'image' => '/images/exercises/henkin.png',
                                ],
                                [
                                    'text' => '割引',
                                    'image' => '/images/exercises/waribiki.png',
                                ],
                                [
                                    'text' => 'レシート',
                                    'image' => '/images/exercises/reshito.png',
                                ],
                            ],
                            'correct_answer' => '交換',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '大きい',
                                '大きかった',
                                '大きく',
                                '大きな',
                            ],
                            'sentence' => 'このシャツは小さすぎます。もっと____サイズが必要です。',
                            'correct_answer' => '大きい',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                '交換したい',
                                '大きい',
                                'サイズに',
                                'のですが',
                                'これを',
                            ],
                            'correct_order' => [
                                'これを',
                                '大きい',
                                'サイズに',
                                '交換したい',
                                'のですが',
                            ],
                            'target_sentence' => 'これを大きいサイズに交換したいのですが',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'これのもっと小さいサイズはありますか？',
                                'レシートはお持ちですか？',
                                '返金をご希望ですか？',
                                'この色はお好きですか？',
                            ],
                            'audio_url' => '/audio/exercises/kore-no-motto-chiisai-saizu-wa-arimasu-ka.mp3',
                            'audio_text' => 'これのもっと小さいサイズはありますか？',
                            'correct_answer' => 'これのもっと小さいサイズはありますか？',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                'これをもっと大きいサイズに交換したいのですが',
                                '新しい靴を買いたいです',
                                '返金だけをお願いします',
                                'この靴を保管したいです',
                            ],
                            'question' => '靴を大きいサイズに交換するために何と言うべきですか？',
                            'correct_answer' => 'これをもっと大きいサイズに交換したいのですが',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                '小さすぎます',
                                'は',
                                '私には',
                                'この',
                                '靴',
                            ],
                            'correct_order' => [
                                'この',
                                '靴',
                                'は',
                                '私には',
                                '小さすぎます',
                            ],
                            'target_sentence' => 'この靴は私には小さすぎます',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 4: Receipts & Proof of Purchase',
                'order' => 4,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => 'レシート',
                            'options' => [
                                [
                                    'text' => 'レシート',
                                    'image' => '/images/exercises/reshito.png',
                                ],
                                [
                                    'text' => '保証書',
                                    'image' => '/images/exercises/hoshousho.png',
                                ],
                                [
                                    'text' => 'クーポン',
                                    'image' => '/images/exercises/kupon.png',
                                ],
                                [
                                    'text' => '割引',
                                    'image' => '/images/exercises/waribiki.png',
                                ],
                            ],
                            'correct_answer' => 'レシート',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '買いました',
                                '買います',
                                '買う',
                                '買っている',
                            ],
                            'sentence' => '先週このジャケットを____。',
                            'correct_answer' => '買いました',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                'なくしました',
                                'レシートを',
                            ],
                            'correct_order' => [
                                'レシートを',
                                'なくしました',
                            ],
                            'target_sentence' => 'レシートをなくしました',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '購入証明書はお持ちですか？',
                                '買い物リストはお持ちですか？',
                                '割引カードはお持ちですか？',
                                '買い物袋はお持ちですか？',
                            ],
                            'audio_url' => '/audio/exercises/kounyuu-shoumeisho-wa-omochi-desu-ka.mp3',
                            'audio_text' => '購入証明書はお持ちですか？',
                            'correct_answer' => '購入証明書はお持ちですか？',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                '商品を購入したことを示すもの',
                                '割引の一種',
                                'お店の会員カード',
                                '買い物リスト',
                            ],
                            'question' => '「購入証明書」とは何ですか？',
                            'correct_answer' => '商品を購入したことを示すもの',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '元のレシートをまだ持っています',
                                'レシートをもらったことがありません',
                                '新しいレシートが欲しいです',
                                '買い物袋をなくしました',
                            ],
                            'audio_url' => '/audio/exercises/moto-no-reshito-wo-mada-motte-imasu.mp3',
                            'audio_text' => '元のレシートをまだ持っています',
                            'correct_answer' => '元のレシートをまだ持っています',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 5: Store Return Policies',
                'order' => 5,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => 'ポリシー',
                            'options' => [
                                [
                                    'text' => 'ポリシー',
                                    'image' => '/images/exercises/porishi.png',
                                ],
                                [
                                    'text' => 'レシート',
                                    'image' => '/images/exercises/reshito.png',
                                ],
                                [
                                    'text' => '保証書',
                                    'image' => '/images/exercises/hoshousho.png',
                                ],
                                [
                                    'text' => '割引',
                                    'image' => '/images/exercises/waribiki.png',
                                ],
                            ],
                            'correct_answer' => 'ポリシー',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '以内に',
                                'の中に',
                                'の間に',
                                'に',
                            ],
                            'sentence' => 'この商品は30日____返品できます。',
                            'correct_answer' => '以内に',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                '返品しなければなりません',
                                '以内に',
                                '30日',
                                'それを',
                            ],
                            'correct_order' => [
                                '30日',
                                '以内に',
                                'それを',
                                '返品しなければなりません',
                            ],
                            'target_sentence' => '30日以内にそれを返品しなければなりません',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                '返品ポリシーは何ですか？',
                                '電話番号は何ですか？',
                                'これの価格はいくらですか？',
                                '何時に開店しますか？',
                            ],
                            'audio_url' => '/audio/exercises/henpin-porishi-wa-nan-desu-ka.mp3',
                            'audio_text' => '返品ポリシーは何ですか？',
                            'correct_answer' => '返品ポリシーは何ですか？',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                '一定の日数以内',
                                '購入した当日のみ',
                                '決してできない',
                                'マネージャーがいる時のみ',
                            ],
                            'question' => 'ほとんどの店舗ポリシーによると、いつ商品を返品できますか？',
                            'correct_answer' => '一定の日数以内',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                'レシートまたは購入証明書',
                                'ショッピングカート',
                                '割引クーポン',
                                'ポイントカード',
                            ],
                            'question' => 'ほとんどのポリシーで返品するには何が必要ですか？',
                            'correct_answer' => 'レシートまたは購入証明書',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Lesson 6: Talking to Customer Service',
                'order' => 6,
                'exercises' => [
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => 'マネージャー',
                            'options' => [
                                [
                                    'text' => 'マネージャー',
                                    'image' => '/images/exercises/maneja.png',
                                ],
                                [
                                    'text' => 'レジ係',
                                    'image' => '/images/exercises/reji-gakari.png',
                                ],
                                [
                                    'text' => '顧客',
                                    'image' => '/images/exercises/kokyaku.png',
                                ],
                                [
                                    'text' => '見知らぬ人',
                                    'image' => '/images/exercises/mishiranu-hito.png',
                                ],
                            ],
                            'correct_answer' => 'マネージャー',
                        ],
                    ],
                    [
                        'type' => 'fill_blank',
                        'data' => [
                            'options' => [
                                '手伝って',
                                '手伝う',
                                '手伝っている',
                                '手伝った',
                            ],
                            'sentence' => '返品を____いただけますか？',
                            'correct_answer' => '手伝って',
                        ],
                    ],
                    [
                        'type' => 'tap_word',
                        'data' => [
                            'words' => [
                                'いただけますか',
                                '返品を',
                                '手伝って',
                            ],
                            'correct_order' => [
                                '返品を',
                                '手伝って',
                                'いただけますか',
                            ],
                            'target_sentence' => '返品を手伝っていただけますか',
                        ],
                    ],
                    [
                        'type' => 'listen_select',
                        'data' => [
                            'options' => [
                                'マネージャーと話したいのですが',
                                '贈り物を買いたいのですが',
                                '割引が欲しいのですが',
                                '現金で支払いたいのですが',
                            ],
                            'audio_url' => '/audio/exercises/maneja-to-hanashitai-no-desu-ga.mp3',
                            'audio_text' => 'マネージャーと話したいのですが',
                            'correct_answer' => 'マネージャーと話したいのですが',
                        ],
                    ],
                    [
                        'type' => 'multiple_choice',
                        'data' => [
                            'options' => [
                                '返品を手伝っていただけますか？',
                                '今すぐお金を返せ！',
                                'この店はひどい。',
                                '助けは必要ありません。',
                            ],
                            'question' => 'カスタマーサービスで丁寧に助けを求めるには何と言えますか？',
                            'correct_answer' => '返品を手伝っていただけますか？',
                        ],
                    ],
                    [
                        'type' => 'match_pairs',
                        'data' => [
                            'word' => '苦情',
                            'options' => [
                                [
                                    'text' => '苦情',
                                    'image' => '/images/exercises/kujou.png',
                                ],
                                [
                                    'text' => '褒め言葉',
                                    'image' => '/images/exercises/home-kotoba.png',
                                ],
                                [
                                    'text' => '質問',
                                    'image' => '/images/exercises/shitsumon.png',
                                ],
                                [
                                    'text' => '回答',
                                    'image' => '/images/exercises/kaitou.png',
                                ],
                            ],
                            'correct_answer' => '苦情',
                        ],
                    ],
                ],
            ],
        ];
    }
}
