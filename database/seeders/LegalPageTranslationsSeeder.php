<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use Illuminate\Database\Seeder;

/**
 * Fills the Terms and Privacy translations.
 *
 * **Only writes into empty slots.** A language an admin has already written is
 * left alone, so running this again after someone has edited French in the
 * panel cannot overwrite their work. That also makes it safe to re-run on
 * deploy.
 *
 * Each row is stamped with a hash of the English it was translated from, so the
 * admin panel's "out of date" flag works from day one: edit the English and
 * every one of these is marked for review immediately.
 *
 * ---
 *
 * **These are translations of a legal document and have not been reviewed by a
 * lawyer or a native-speaking legal translator.** They faithfully carry the
 * English across, and the HTML structure is identical, but clause wording in a
 * privacy policy can carry weight that a good general translation still misses
 * — particularly around data retention, liability and the GDPR/CCPA references.
 * Treat them as a solid starting point that someone should read before it
 * matters, not as a signed-off legal text. Everything is editable in the admin
 * panel, which is where corrections belong.
 */
class LegalPageTranslationsSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->translations() as $slug => $locales) {
            $source = LegalPage::where('slug', $slug)
                ->where('locale', LegalPage::SOURCE_LOCALE)
                ->first();

            if (! $source) {
                $this->command?->warn("No English `{$slug}` to translate from; skipping.");

                continue;
            }

            $hash = LegalPage::fingerprint($source->content);

            foreach ($locales as $locale => $page) {
                $existing = LegalPage::where('slug', $slug)->where('locale', $locale)->first();

                // Anything with real content in it was written by a person.
                if ($existing && trim((string) $existing->content) !== '') {
                    $this->command?->line("  {$slug}/{$locale}: already written, left alone");

                    continue;
                }

                LegalPage::updateOrCreate(
                    ['slug' => $slug, 'locale' => $locale],
                    [
                        'title' => $page['title'],
                        'content' => $page['content'],
                        'source_hash' => $hash,
                    ],
                );

                $this->command?->info("  {$slug}/{$locale}: written");
            }
        }
    }

    /**
     * @return array<string, array<string, array{title: string, content: string}>>
     */
    private function translations(): array
    {
        return [
            'terms' => [
                'fr' => [
                    'title' => 'Conditions générales',
                    'content' => <<<'HTML'
<p>Bienvenue sur LinguistPath. Les présentes conditions générales (« Conditions ») régissent votre accès au site web, à l'application et aux services associés de LinguistPath (le « Service ») ainsi que leur utilisation. En créant un compte ou en utilisant le Service, vous acceptez d'être lié par ces Conditions.</p>
<h2>1. Conditions d'accès</h2>
<p>Vous devez avoir au moins 13 ans pour créer un compte. Si vous n'avez pas atteint la majorité dans votre juridiction, vous confirmez qu'un parent ou un tuteur légal a pris connaissance de ces Conditions et les a acceptées en votre nom.</p>
<h2>2. Votre compte</h2>
<p>Vous êtes responsable de la confidentialité de vos identifiants de connexion et de toute activité effectuée depuis votre compte. Merci de nous prévenir immédiatement si vous soupçonnez une utilisation non autorisée de votre compte.</p>
<h2>3. Abonnements et achats</h2>
<p>LinguistPath propose des achats intégrés facultatifs (packs de gemmes, recharges de cœurs) ainsi que des formules d'abonnement à renouvellement automatique. Tous les paiements sont traités de façon sécurisée par Stripe. Les prix sont affichés au moment de l'achat et peuvent évoluer ; ces changements n'affectent pas les achats déjà effectués.</p>
<p>Les abonnements se renouvellent automatiquement à la fin de chaque période de facturation, sauf résiliation préalable. Vous pouvez résilier à tout moment ; la résiliation prend effet à la fin de la période en cours. Les gemmes achetées et les périodes de facturation écoulées ne sont généralement pas remboursables, sauf lorsque la loi applicable l'exige.</p>
<h2>4. Utilisation acceptable</h2>
<ul>
<li>N'essayez pas de perturber le Service, d'en faire l'ingénierie inverse ou d'y accéder sans autorisation.</li>
<li>N'utilisez pas d'outils automatisés (robots, scripts) pour accumuler des récompenses, de l'XP ou de la monnaie virtuelle.</li>
<li>Ne publiez et ne partagez aucun contenu illicite, abusif ou portant atteinte aux droits d'autrui.</li>
</ul>
<h2>5. Propriété intellectuelle</h2>
<p>L'ensemble des contenus de cours, logiciels, éléments graphiques et éléments de marque de LinguistPath nous appartiennent ou appartiennent à nos concédants de licence et sont protégés par le droit de la propriété intellectuelle. Vous pouvez utiliser le Service uniquement à des fins personnelles et non commerciales d'apprentissage des langues.</p>
<h2>6. Résiliation</h2>
<p>Nous pouvons suspendre ou fermer votre compte en cas de violation de ces Conditions. Vous pouvez cesser d'utiliser le Service et fermer votre compte à tout moment.</p>
<h2>7. Exclusions de garantie et limitation de responsabilité</h2>
<p>Le Service est fourni « en l'état », sans garantie d'aucune sorte. Dans toute la mesure permise par la loi, LinguistPath ne saurait être tenu responsable de tout dommage indirect, accessoire ou consécutif résultant de votre utilisation du Service.</p>
<h2>8. Modifications des présentes Conditions</h2>
<p>Nous pouvons mettre à jour ces Conditions de temps à autre. Les changements importants vous seront communiqués via l'application ou par e-mail. La poursuite de l'utilisation du Service après l'entrée en vigueur des changements vaut acceptation des Conditions révisées.</p>
<h2>9. Nous contacter</h2>
<p>Pour toute question relative à ces Conditions, consultez notre page <a href="/contact">Nous contacter</a>.</p>
HTML,
                ],
                'es' => [
                    'title' => 'Términos y condiciones',
                    'content' => <<<'HTML'
<p>Te damos la bienvenida a LinguistPath. Estos términos y condiciones (los «Términos») regulan tu acceso y uso del sitio web, la aplicación y los servicios relacionados de LinguistPath (el «Servicio»). Al crear una cuenta o utilizar el Servicio, aceptas quedar vinculado por estos Términos.</p>
<h2>1. Requisitos de acceso</h2>
<p>Debes tener al menos 13 años para crear una cuenta. Si no has alcanzado la mayoría de edad en tu jurisdicción, confirmas que un padre, madre o tutor legal ha revisado y aceptado estos Términos en tu nombre.</p>
<h2>2. Tu cuenta</h2>
<p>Eres responsable de mantener la confidencialidad de tus credenciales de acceso y de toda la actividad que se produzca en tu cuenta. Avísanos de inmediato si sospechas que alguien la está usando sin autorización.</p>
<h2>3. Suscripciones y compras</h2>
<p>LinguistPath ofrece compras opcionales dentro de la aplicación (como packs de gemas y recargas de corazones) y planes de suscripción de renovación automática. Todos los pagos se procesan de forma segura a través de Stripe. Los precios se muestran en el momento de la compra y pueden cambiar con el tiempo; los cambios no afectan a las compras ya realizadas.</p>
<p>Las suscripciones se renuevan automáticamente al final de cada periodo de facturación salvo que se cancelen antes. Puedes cancelar cuando quieras; la cancelación surte efecto al final del periodo en curso. Las gemas compradas y los periodos de facturación ya transcurridos no son reembolsables por lo general, salvo cuando la ley aplicable lo exija.</p>
<h2>4. Uso aceptable</h2>
<ul>
<li>No intentes interrumpir el Servicio, aplicarle ingeniería inversa ni acceder a él sin autorización.</li>
<li>No utilices herramientas automatizadas (bots, scripts) para acumular recompensas, XP o moneda virtual.</li>
<li>No subas ni compartas contenido ilícito, abusivo o que vulnere los derechos de terceros.</li>
</ul>
<h2>5. Propiedad intelectual</h2>
<p>Todo el contenido de los cursos, el software, los gráficos y la identidad de marca de LinguistPath nos pertenecen a nosotros o a nuestros licenciantes y están protegidos por las leyes de propiedad intelectual. Solo puedes usar el Servicio para el aprendizaje personal de idiomas, sin fines comerciales.</p>
<h2>6. Cancelación</h2>
<p>Podemos suspender o cerrar tu cuenta si incumples estos Términos. Tú puedes dejar de usar el Servicio y cerrar tu cuenta cuando quieras.</p>
<h2>7. Descargos de responsabilidad y limitación de responsabilidad</h2>
<p>El Servicio se ofrece «tal cual», sin garantías de ningún tipo. En la máxima medida permitida por la ley, LinguistPath no será responsable de daños indirectos, incidentales o consecuentes derivados del uso del Servicio.</p>
<h2>8. Cambios en estos Términos</h2>
<p>Podemos actualizar estos Términos cada cierto tiempo. Los cambios importantes se comunicarán a través de la aplicación o por correo electrónico. Seguir usando el Servicio después de que los cambios entren en vigor supone la aceptación de los Términos revisados.</p>
<h2>9. Contacto</h2>
<p>Si tienes dudas sobre estos Términos, visita nuestra página de <a href="/contact">Contacto</a>.</p>
HTML,
                ],
                'de' => [
                    'title' => 'Allgemeine Geschäftsbedingungen',
                    'content' => <<<'HTML'
<p>Willkommen bei LinguistPath. Diese Allgemeinen Geschäftsbedingungen („Bedingungen“) regeln deinen Zugang zur Website, zur App und zu den zugehörigen Diensten von LinguistPath (der „Dienst“) sowie deren Nutzung. Mit dem Erstellen eines Kontos oder der Nutzung des Dienstes erklärst du dich mit diesen Bedingungen einverstanden.</p>
<h2>1. Voraussetzungen</h2>
<p>Du musst mindestens 13 Jahre alt sein, um ein Konto zu erstellen. Wenn du nach dem Recht deines Landes noch nicht volljährig bist, bestätigst du, dass ein Elternteil oder ein gesetzlicher Vormund diese Bedingungen geprüft und in deinem Namen akzeptiert hat.</p>
<h2>2. Dein Konto</h2>
<p>Du bist dafür verantwortlich, deine Zugangsdaten vertraulich zu halten, und für sämtliche Aktivitäten in deinem Konto. Bitte informiere uns umgehend, wenn du eine unbefugte Nutzung deines Kontos vermutest.</p>
<h2>3. Abonnements und Käufe</h2>
<p>LinguistPath bietet optionale In-App-Käufe (etwa Edelstein-Pakete und Herz-Auffüllungen) sowie automatisch verlängerte Abonnements an. Alle Zahlungen werden sicher über Stripe abgewickelt. Die Preise werden beim Kauf angezeigt und können sich ändern; Änderungen wirken sich nicht auf bereits abgeschlossene Käufe aus.</p>
<p>Abonnements verlängern sich am Ende jedes Abrechnungszeitraums automatisch, sofern sie nicht vorher gekündigt werden. Du kannst jederzeit kündigen; die Kündigung wird zum Ende des laufenden Abrechnungszeitraums wirksam. Gekaufte Edelsteine und bereits abgelaufene Abrechnungszeiträume sind in der Regel nicht erstattungsfähig, außer wenn geltendes Recht dies vorschreibt.</p>
<h2>4. Zulässige Nutzung</h2>
<ul>
<li>Versuche nicht, den Dienst zu stören, zurückzuentwickeln oder unbefugt darauf zuzugreifen.</li>
<li>Nutze keine automatisierten Werkzeuge (Bots, Skripte), um Belohnungen, XP oder In-App-Währung zu sammeln.</li>
<li>Lade keine Inhalte hoch und teile keine Inhalte, die rechtswidrig oder beleidigend sind oder Rechte Dritter verletzen.</li>
</ul>
<h2>5. Geistiges Eigentum</h2>
<p>Sämtliche Kursinhalte, Software, Grafiken und Markenelemente von LinguistPath gehören uns oder unseren Lizenzgebern und sind durch Gesetze zum Schutz geistigen Eigentums geschützt. Du darfst den Dienst ausschließlich zum persönlichen, nicht gewerblichen Sprachenlernen nutzen.</p>
<h2>6. Beendigung</h2>
<p>Wir können dein Konto sperren oder schließen, wenn du gegen diese Bedingungen verstößt. Du kannst die Nutzung des Dienstes jederzeit einstellen und dein Konto schließen.</p>
<h2>7. Haftungsausschluss und Haftungsbeschränkung</h2>
<p>Der Dienst wird „wie besehen“ und ohne jegliche Gewährleistung bereitgestellt. Soweit gesetzlich zulässig, haftet LinguistPath nicht für indirekte Schäden, Begleitschäden oder Folgeschäden, die aus deiner Nutzung des Dienstes entstehen.</p>
<h2>8. Änderungen dieser Bedingungen</h2>
<p>Wir können diese Bedingungen von Zeit zu Zeit aktualisieren. Über wesentliche Änderungen informieren wir dich in der App oder per E-Mail. Wenn du den Dienst nach Inkrafttreten der Änderungen weiter nutzt, gilt das als Zustimmung zu den geänderten Bedingungen.</p>
<h2>9. Kontakt</h2>
<p>Bei Fragen zu diesen Bedingungen besuche bitte unsere Seite <a href="/contact">Kontakt</a>.</p>
HTML,
                ],
                'ja' => [
                    'title' => '利用規約',
                    'content' => <<<'HTML'
<p>LinguistPath へようこそ。本利用規約（以下「本規約」）は、LinguistPath のウェブサイト、アプリおよび関連サービス（以下「本サービス」）へのアクセスと利用について定めるものです。アカウントを作成するか本サービスを利用した時点で、本規約に同意したものとみなされます。</p>
<h2>1. 利用資格</h2>
<p>アカウントの作成には 13 歳以上である必要があります。お住まいの国や地域で成年に達していない場合は、保護者または法定代理人が本規約を確認し、あなたに代わって同意したことを表明するものとします。</p>
<h2>2. アカウントについて</h2>
<p>ログイン情報の管理、およびアカウントで行われるすべての操作について、お客様が責任を負うものとします。アカウントの不正利用が疑われる場合は、ただちにご連絡ください。</p>
<h2>3. サブスクリプションと購入</h2>
<p>LinguistPath では、任意のアプリ内購入（ジェムパックやハートの回復など）と、自動更新のサブスクリプションプランをご用意しています。すべての決済は Stripe を通じて安全に処理されます。価格は購入時に表示され、変更される場合がありますが、その変更が購入済みの内容に影響することはありません。</p>
<p>サブスクリプションは、事前に解約されない限り、各請求期間の終了時に自動的に更新されます。解約はいつでも可能で、現在の請求期間の終了時に有効となります。購入済みのジェムおよび経過した請求期間は、適用される法令で定められている場合を除き、原則として返金の対象外です。</p>
<h2>4. 禁止事項</h2>
<ul>
<li>本サービスの妨害、リバースエンジニアリング、不正アクセスを試みないでください。</li>
<li>報酬、XP、アプリ内通貨を獲得する目的で自動化ツール（ボットやスクリプト）を使用しないでください。</li>
<li>違法・不快な内容、または他者の権利を侵害する内容を投稿・共有しないでください。</li>
</ul>
<h2>5. 知的財産権</h2>
<p>LinguistPath 上のコース内容、ソフトウェア、画像、ブランド要素はすべて当社または当社のライセンサーに帰属し、知的財産権に関する法令により保護されています。本サービスは、個人的かつ非商業的な語学学習の目的にのみご利用いただけます。</p>
<h2>6. 利用の停止</h2>
<p>本規約に違反した場合、アカウントを一時停止または削除することがあります。お客様はいつでも本サービスの利用を中止し、アカウントを削除できます。</p>
<h2>7. 免責事項および責任の制限</h2>
<p>本サービスは「現状有姿」で提供され、いかなる保証も行いません。法律で認められる最大限の範囲において、LinguistPath は本サービスの利用に起因する間接的・付随的・結果的損害について責任を負いません。</p>
<h2>8. 本規約の変更</h2>
<p>本規約は随時更新されることがあります。重要な変更については、アプリまたはメールでお知らせします。変更の発効後も本サービスを利用し続けた場合、改定後の規約に同意したものとみなされます。</p>
<h2>9. お問い合わせ</h2>
<p>本規約についてご不明な点がある場合は、<a href="/contact">お問い合わせ</a>ページをご覧ください。</p>
HTML,
                ],
                'ko' => [
                    'title' => '이용약관',
                    'content' => <<<'HTML'
<p>LinguistPath에 오신 것을 환영합니다. 본 이용약관(이하 "약관")은 LinguistPath 웹사이트, 앱 및 관련 서비스(이하 "서비스")에 대한 접근과 이용에 적용됩니다. 계정을 만들거나 서비스를 이용하면 본 약관에 동의한 것으로 간주됩니다.</p>
<h2>1. 이용 자격</h2>
<p>계정을 만들려면 만 13세 이상이어야 합니다. 거주 지역에서 성년에 이르지 않은 경우, 부모 또는 법정대리인이 본 약관을 확인하고 귀하를 대신하여 동의했음을 확인하는 것으로 봅니다.</p>
<h2>2. 계정</h2>
<p>로그인 정보를 안전하게 관리할 책임과 계정에서 이루어지는 모든 활동에 대한 책임은 이용자에게 있습니다. 계정이 무단으로 사용된 것으로 의심되면 즉시 알려 주시기 바랍니다.</p>
<h2>3. 구독 및 결제</h2>
<p>LinguistPath는 선택적 인앱 구매(젬 팩, 하트 충전 등)와 자동 갱신되는 구독 플랜을 제공합니다. 모든 결제는 Stripe를 통해 안전하게 처리됩니다. 가격은 구매 시점에 표시되며 변경될 수 있으나, 변경 사항이 이미 완료된 구매에 영향을 주지는 않습니다.</p>
<p>구독은 사전에 해지하지 않는 한 각 결제 주기가 끝날 때 자동으로 갱신됩니다. 언제든지 해지할 수 있으며, 해지는 현재 결제 주기가 끝나는 시점에 적용됩니다. 이미 구매한 젬과 경과한 결제 주기는 관련 법령에서 요구하는 경우를 제외하고 원칙적으로 환불되지 않습니다.</p>
<h2>4. 금지 행위</h2>
<ul>
<li>서비스를 방해하거나 역설계하거나 무단으로 접근하려고 시도하지 마십시오.</li>
<li>보상, XP, 인앱 재화를 취득할 목적으로 자동화 도구(봇, 스크립트)를 사용하지 마십시오.</li>
<li>불법적이거나 모욕적인 콘텐츠, 또는 타인의 권리를 침해하는 콘텐츠를 올리거나 공유하지 마십시오.</li>
</ul>
<h2>5. 지식재산권</h2>
<p>LinguistPath의 모든 학습 콘텐츠, 소프트웨어, 그래픽, 브랜드 요소는 당사 또는 당사의 라이선서에 귀속되며 지식재산권 법령의 보호를 받습니다. 서비스는 개인적이고 비상업적인 언어 학습 목적으로만 이용할 수 있습니다.</p>
<h2>6. 이용 종료</h2>
<p>본 약관을 위반하는 경우 계정을 정지하거나 삭제할 수 있습니다. 이용자는 언제든지 서비스 이용을 중단하고 계정을 삭제할 수 있습니다.</p>
<h2>7. 보증의 부인 및 책임의 제한</h2>
<p>서비스는 어떠한 보증도 없이 "있는 그대로" 제공됩니다. 법률이 허용하는 최대 범위에서, LinguistPath는 서비스 이용으로 발생하는 간접적, 부수적 또는 결과적 손해에 대해 책임지지 않습니다.</p>
<h2>8. 약관의 변경</h2>
<p>본 약관은 수시로 업데이트될 수 있습니다. 중요한 변경 사항은 앱 또는 이메일로 안내해 드립니다. 변경 사항이 적용된 후에도 서비스를 계속 이용하면 변경된 약관에 동의한 것으로 간주됩니다.</p>
<h2>9. 문의하기</h2>
<p>본 약관에 대해 궁금한 점이 있으시면 <a href="/contact">문의하기</a> 페이지를 방문해 주세요.</p>
HTML,
                ],
                'tr' => [
                    'title' => 'Şartlar ve Koşullar',
                    'content' => <<<'HTML'
<p>LinguistPath'e hoş geldiniz. Bu Şartlar ve Koşullar ("Şartlar"), LinguistPath web sitesine, uygulamasına ve ilgili hizmetlerine ("Hizmet") erişiminizi ve bunları kullanımınızı düzenler. Bir hesap oluşturarak veya Hizmet'i kullanarak bu Şartlar ile bağlı olmayı kabul etmiş olursunuz.</p>
<h2>1. Uygunluk</h2>
<p>Hesap oluşturmak için en az 13 yaşında olmanız gerekir. Bulunduğunuz ülkede reşit değilseniz, bir ebeveynin veya yasal vasinin bu Şartlar'ı incelediğini ve sizin adınıza kabul ettiğini beyan etmiş olursunuz.</p>
<h2>2. Hesabınız</h2>
<p>Giriş bilgilerinizin gizliliğini korumaktan ve hesabınız üzerinden gerçekleşen tüm etkinliklerden siz sorumlusunuz. Hesabınızın izinsiz kullanıldığından şüphelenirseniz lütfen hemen bize bildirin.</p>
<h2>3. Abonelikler ve Satın Alımlar</h2>
<p>LinguistPath, isteğe bağlı uygulama içi satın alımlar (mücevher paketleri ve kalp yenileme gibi) ile otomatik yenilenen abonelik planları sunar. Tüm ödemeler Stripe üzerinden güvenli şekilde işlenir. Fiyatlar satın alma sırasında gösterilir ve zaman zaman değişebilir; bu değişiklikler tamamlanmış satın alımları etkilemez.</p>
<p>Abonelikler, önceden iptal edilmedikçe her fatura döneminin sonunda otomatik olarak yenilenir. Aboneliğinizi istediğiniz zaman iptal edebilirsiniz; iptal, mevcut fatura döneminin sonunda geçerli olur. Satın alınan mücevherler ve tamamlanmış fatura dönemleri, ilgili mevzuatın gerektirdiği haller dışında genel olarak iade edilmez.</p>
<h2>4. Kabul Edilebilir Kullanım</h2>
<ul>
<li>Hizmet'i aksatmaya, tersine mühendislik yapmaya veya yetkisiz erişim sağlamaya çalışmayın.</li>
<li>Ödül, XP veya uygulama içi para biriktirmek için otomatik araçlar (botlar, komut dosyaları) kullanmayın.</li>
<li>Hukuka aykırı, saldırgan veya başkalarının haklarını ihlal eden içerik yüklemeyin ve paylaşmayın.</li>
</ul>
<h2>5. Fikri Mülkiyet</h2>
<p>LinguistPath üzerindeki tüm kurs içerikleri, yazılım, grafikler ve marka unsurları bize veya lisans verenlerimize aittir ve fikri mülkiyet mevzuatıyla korunmaktadır. Hizmet'i yalnızca kişisel ve ticari olmayan dil öğrenimi amacıyla kullanabilirsiniz.</p>
<h2>6. Fesih</h2>
<p>Bu Şartlar'ı ihlal etmeniz halinde hesabınızı askıya alabilir veya kapatabiliriz. Siz de istediğiniz zaman Hizmet'i kullanmayı bırakabilir ve hesabınızı kapatabilirsiniz.</p>
<h2>7. Feragatnameler ve Sorumluluğun Sınırlandırılması</h2>
<p>Hizmet, hiçbir garanti verilmeksizin "olduğu gibi" sunulmaktadır. Yasaların izin verdiği azami ölçüde, LinguistPath, Hizmet'i kullanmanızdan doğan dolaylı, arızi veya sonuç niteliğindeki zararlardan sorumlu değildir.</p>
<h2>8. Bu Şartlar'daki Değişiklikler</h2>
<p>Bu Şartlar'ı zaman zaman güncelleyebiliriz. Önemli değişiklikler uygulama üzerinden veya e-posta ile bildirilir. Değişiklikler yürürlüğe girdikten sonra Hizmet'i kullanmaya devam etmeniz, güncellenmiş Şartlar'ı kabul ettiğiniz anlamına gelir.</p>
<h2>9. Bize Ulaşın</h2>
<p>Bu Şartlar hakkında sorularınız varsa lütfen <a href="/contact">Bize Ulaşın</a> sayfamızı ziyaret edin.</p>
HTML,
                ],
                'ru' => [
                    'title' => 'Условия и положения',
                    'content' => <<<'HTML'
<p>Добро пожаловать в LinguistPath. Настоящие Условия и положения («Условия») регулируют ваш доступ к веб-сайту, приложению и связанным сервисам LinguistPath («Сервис») и их использование. Создавая учётную запись или используя Сервис, вы соглашаетесь соблюдать настоящие Условия.</p>
<h2>1. Право на использование</h2>
<p>Чтобы создать учётную запись, вам должно быть не менее 13 лет. Если вы не достигли совершеннолетия в вашей стране, вы подтверждаете, что родитель или законный представитель ознакомился с настоящими Условиями и принял их от вашего имени.</p>
<h2>2. Ваша учётная запись</h2>
<p>Вы несёте ответственность за сохранение конфиденциальности своих учётных данных и за все действия, совершённые через вашу учётную запись. Если вы подозреваете несанкционированное использование, немедленно сообщите нам.</p>
<h2>3. Подписки и покупки</h2>
<p>LinguistPath предлагает необязательные покупки внутри приложения (например, наборы самоцветов и восстановление сердец), а также планы подписки с автоматическим продлением. Все платежи безопасно обрабатываются через Stripe. Цены указываются в момент покупки и могут время от времени меняться; такие изменения не затрагивают уже совершённые покупки.</p>
<p>Подписки продлеваются автоматически в конце каждого расчётного периода, если не были отменены заранее. Вы можете отменить подписку в любой момент; отмена вступает в силу в конце текущего расчётного периода. Приобретённые самоцветы и завершённые расчётные периоды, как правило, не подлежат возврату, кроме случаев, предусмотренных законом.</p>
<h2>4. Допустимое использование</h2>
<ul>
<li>Не используйте Сервис в незаконных целях и не нарушайте чужие права.</li>
<li>Не пытайтесь получить доступ к чужим учётным записям и не вмешивайтесь в работу Сервиса.</li>
<li>Не используйте автоматизированные средства для получения игровых наград.</li>
<li>Не копируйте и не распространяйте учебные материалы без нашего разрешения.</li>
</ul>
<h2>5. Содержание и интеллектуальная собственность</h2>
<p>Все учебные материалы, изображения и программное обеспечение Сервиса принадлежат LinguistPath или используются по лицензии. Вам предоставляется личная неисключительная лицензия на использование Сервиса в учебных целях.</p>
<h2>6. Прекращение действия</h2>
<p>Мы можем приостановить или закрыть учётную запись, нарушающую настоящие Условия. Вы можете удалить свою учётную запись в любой момент через настройки профиля.</p>
<h2>7. Отказ от ответственности</h2>
<p>Сервис предоставляется «как есть». Мы стремимся к точности учебных материалов, но не гарантируем какой-либо конкретный результат обучения.</p>
<h2>8. Изменения условий</h2>
<p>Мы можем время от времени обновлять настоящие Условия. Продолжая пользоваться Сервисом после внесения изменений, вы принимаете обновлённые Условия.</p>
<h2>9. Связь с нами</h2>
<p>По вопросам, касающимся настоящих Условий, пишите нам через страницу «Контакты».</p>
HTML,
                ],
                'ar' => [
                    'title' => 'الشروط والأحكام',
                    'content' => <<<'HTML'
<p>مرحبا بك في LinguistPath. تحكم هذه الشروط والأحكام («الشروط») وصولك إلى موقع LinguistPath وتطبيقه والخدمات المرتبطة به («الخدمة») واستخدامك لها. بإنشاء حساب أو باستخدام الخدمة فإنك توافق على الالتزام بهذه الشروط.</p>
<h2>1. أهلية الاستخدام</h2>
<p>يجب أن يكون عمرك 13 عاما على الأقل لإنشاء حساب. وإذا لم تكن قد بلغت سن الرشد في بلدك، فإنك تقر بأن أحد الوالدين أو الوصي القانوني قد اطلع على هذه الشروط وقبلها نيابة عنك.</p>
<h2>2. حسابك</h2>
<p>أنت مسؤول عن الحفاظ على سرية بيانات الدخول الخاصة بك وعن جميع الأنشطة التي تتم عبر حسابك. إذا اشتبهت في استخدام غير مصرح به، فيرجى إبلاغنا فورا.</p>
<h2>3. الاشتراكات والمشتريات</h2>
<p>يوفر LinguistPath مشتريات اختيارية داخل التطبيق (مثل حزم الجواهر وتجديد القلوب) وخطط اشتراك تتجدد تلقائيا. تتم معالجة جميع المدفوعات بأمان عبر Stripe. تظهر الأسعار عند الشراء وقد تتغير من وقت لآخر، ولا تؤثر هذه التغييرات على المشتريات المكتملة.</p>
<p>تتجدد الاشتراكات تلقائيا في نهاية كل دورة فوترة ما لم يتم إلغاؤها مسبقا. يمكنك إلغاء اشتراكك في أي وقت، ويسري الإلغاء في نهاية دورة الفوترة الحالية. الجواهر المشتراة ودورات الفوترة المكتملة غير قابلة للاسترداد عموما إلا حيث يقتضي القانون ذلك.</p>
<h2>4. الاستخدام المقبول</h2>
<ul>
<li>لا تستخدم الخدمة لأي غرض غير قانوني ولا تنتهك حقوق الآخرين.</li>
<li>لا تحاول الوصول إلى حسابات الآخرين ولا تعطل عمل الخدمة.</li>
<li>لا تستخدم وسائل آلية للحصول على مكافآت اللعبة.</li>
<li>لا تنسخ المواد التعليمية أو توزعها دون إذن منا.</li>
</ul>
<h2>5. المحتوى والملكية الفكرية</h2>
<p>جميع المواد التعليمية والصور والبرمجيات في الخدمة مملوكة لـ LinguistPath أو مرخصة له. يمنح لك ترخيص شخصي غير حصري لاستخدام الخدمة لأغراض التعلم.</p>
<h2>6. إنهاء الخدمة</h2>
<p>يجوز لنا تعليق أو إغلاق أي حساب يخالف هذه الشروط. ويمكنك حذف حسابك في أي وقت من إعدادات الملف الشخصي.</p>
<h2>7. إخلاء المسؤولية</h2>
<p>تقدم الخدمة «كما هي». نحن نسعى إلى دقة المواد التعليمية، لكننا لا نضمن أي نتيجة تعليمية بعينها.</p>
<h2>8. تغييرات الشروط</h2>
<p>قد نحدث هذه الشروط من وقت لآخر. واستمرارك في استخدام الخدمة بعد التغييرات يعني قبولك للشروط المحدثة.</p>
<h2>9. التواصل معنا</h2>
<p>للاستفسارات المتعلقة بهذه الشروط، راسلنا عبر صفحة «اتصل بنا».</p>
HTML,
                ],
                'az' => [
                    'title' => 'Şərtlər və Qaydalar',
                    'content' => <<<'HTML'
<p>LinguistPath-a xoş gəlmisiniz. Bu Şərtlər və Qaydalar («Şərtlər») LinguistPath veb saytına, tətbiqinə və əlaqəli xidmətlərinə («Xidmət») girişinizi və onlardan istifadənizi tənzimləyir. Hesab yaradaraq və ya Xidmətdən istifadə edərək bu Şərtlərə əməl etməyə razılıq verirsiniz.</p>
<h2>1. İstifadə hüququ</h2>
<p>Hesab yaratmaq üçün ən azı 13 yaşınız olmalıdır. Ölkənizdə həddi-büluğa çatmamısınızsa, valideyninizin və ya qanuni nümayəndənizin bu Şərtləri nəzərdən keçirdiyini və sizin adınızdan qəbul etdiyini təsdiq edirsiniz.</p>
<h2>2. Hesabınız</h2>
<p>Giriş məlumatlarınızın məxfiliyini qorumaq və hesabınız vasitəsilə həyata keçirilən bütün fəaliyyətlərə görə siz məsuliyyət daşıyırsınız. İcazəsiz istifadədən şübhələnsəniz, dərhal bizə bildirin.</p>
<h2>3. Abunəliklər və alışlar</h2>
<p>LinguistPath tətbiqdaxili könüllü alışlar (məsələn, cəvahir paketləri və ürək bərpası) və avtomatik yenilənən abunə planları təklif edir. Bütün ödənişlər Stripe vasitəsilə təhlükəsiz şəkildə emal olunur. Qiymətlər alış zamanı göstərilir və vaxtaşırı dəyişə bilər; bu dəyişikliklər tamamlanmış alışlara təsir etmir.</p>
<p>Abunəliklər əvvəlcədən ləğv edilmədikdə hər hesablama dövrünün sonunda avtomatik yenilənir. Abunəliyinizi istənilən vaxt ləğv edə bilərsiniz; ləğv cari hesablama dövrünün sonunda qüvvəyə minir. Alınmış cəvahirlər və tamamlanmış hesablama dövrləri qanunla tələb olunan hallar istisna olmaqla geri qaytarılmır.</p>
<h2>4. Məqbul istifadə</h2>
<ul>
<li>Xidmətdən qanunsuz məqsədlər üçün istifadə etməyin və başqalarının hüquqlarını pozmayın.</li>
<li>Başqalarının hesablarına daxil olmağa cəhd etməyin və Xidmətin işinə mane olmayın.</li>
<li>Oyun mükafatları qazanmaq üçün avtomatlaşdırılmış vasitələrdən istifadə etməyin.</li>
<li>Tədris materiallarını icazəmiz olmadan köçürməyin və yaymayın.</li>
</ul>
<h2>5. Məzmun və əqli mülkiyyət</h2>
<p>Xidmətdəki bütün tədris materialları, şəkillər və proqram təminatı LinguistPath-a məxsusdur və ya lisenziya əsasında istifadə olunur. Sizə Xidmətdən tədris məqsədilə istifadə üçün şəxsi, qeyri-eksklüziv lisenziya verilir.</p>
<h2>6. Xidmətin dayandırılması</h2>
<p>Bu Şərtləri pozan hesabı dayandıra və ya bağlaya bilərik. Siz isə hesabınızı profil parametrlərindən istənilən vaxt silə bilərsiniz.</p>
<h2>7. Məsuliyyətdən imtina</h2>
<p>Xidmət «olduğu kimi» təqdim edilir. Tədris materiallarının dəqiqliyinə çalışırıq, lakin hər hansı konkret tədris nəticəsinə zəmanət vermirik.</p>
<h2>8. Şərtlərdə dəyişikliklər</h2>
<p>Bu Şərtləri vaxtaşırı yeniləyə bilərik. Dəyişikliklərdən sonra Xidmətdən istifadəyə davam etməyiniz yenilənmiş Şərtləri qəbul etdiyiniz anlamına gəlir.</p>
<h2>9. Bizimlə əlaqə</h2>
<p>Bu Şərtlərlə bağlı suallar üçün «Bizimlə əlaqə» səhifəsindən yazın.</p>
HTML,
                ],
            ],

            'privacy' => [
                'fr' => [
                    'title' => 'Politique de confidentialité',
                    'content' => <<<'HTML'
<p>La présente politique de confidentialité explique comment LinguistPath (« nous ») collecte, utilise et protège vos informations lorsque vous utilisez notre Service.</p>
<h2>1. Informations que nous collectons</h2>
<ul>
<li><strong>Informations de compte :</strong> nom, adresse e-mail et mot de passe (stocké de manière sécurisée, jamais en clair).</li>
<li><strong>Données d'apprentissage :</strong> votre progression, vos résultats aux exercices, vos séries et vos préférences, utilisés pour personnaliser votre apprentissage.</li>
<li><strong>Informations de paiement :</strong> si vous effectuez un achat ou souscrivez un abonnement, le paiement est traité directement par Stripe. Nous ne conservons pas les données complètes de votre carte sur nos serveurs.</li>
<li><strong>Données d'utilisation :</strong> type d'appareil, interactions avec l'application et fuseau horaire, utilisés pour améliorer le Service et calculer correctement les séries quotidiennes.</li>
</ul>
<h2>2. Comment nous utilisons vos informations</h2>
<p>Nous utilisons vos informations pour fournir et améliorer le Service, personnaliser le contenu de vos cours, traiter les paiements, vous communiquer les informations importantes et assurer la sécurité de votre compte.</p>
<h2>3. Partage de vos informations</h2>
<p>Nous ne vendons pas vos données personnelles. Nous ne les partageons qu'avec des prestataires de confiance qui nous aident à faire fonctionner le Service (comme Stripe pour le paiement et notre prestataire d'e-mails pour la vérification des comptes), et uniquement dans la mesure nécessaire à l'exécution de leurs services.</p>
<h2>4. Conservation des données</h2>
<p>Nous conservons les données de votre compte et de votre apprentissage tant que votre compte est actif. Si vous supprimez votre compte, nous supprimerons ou anonymiserons vos données personnelles dans un délai raisonnable, sauf lorsque la loi impose leur conservation.</p>
<h2>5. Vos droits</h2>
<p>Vous pouvez à tout moment consulter, corriger ou demander la suppression de vos données personnelles depuis les paramètres de votre profil, ou en nous contactant. Selon votre lieu de résidence, vous pouvez disposer de droits supplémentaires en vertu de textes tels que le RGPD ou le CCPA.</p>
<h2>6. Protection des mineurs</h2>
<p>LinguistPath ne s'adresse pas aux enfants de moins de 13 ans et nous ne collectons pas sciemment de données personnelles auprès d'enfants de cet âge.</p>
<h2>7. Sécurité</h2>
<p>Nous appliquons des mesures conformes aux standards du secteur, notamment le stockage chiffré des mots de passe et un traitement sécurisé des paiements, pour protéger vos informations. Aucune méthode de transmission sur Internet n'est sûre à 100 % et nous ne pouvons garantir une sécurité absolue.</p>
<h2>8. Modifications de cette politique</h2>
<p>Nous pouvons mettre à jour cette politique de confidentialité de temps à autre. Nous vous informerons des changements importants via l'application ou par e-mail.</p>
<h2>9. Nous contacter</h2>
<p>Pour toute question sur cette politique ou sur le traitement de vos données, consultez notre page <a href="/contact">Nous contacter</a>.</p>
HTML,
                ],
                'es' => [
                    'title' => 'Política de privacidad',
                    'content' => <<<'HTML'
<p>Esta política de privacidad explica cómo LinguistPath («nosotros») recopila, utiliza y protege tu información cuando usas nuestro Servicio.</p>
<h2>1. Información que recopilamos</h2>
<ul>
<li><strong>Información de la cuenta:</strong> nombre, dirección de correo electrónico y contraseña (almacenada de forma segura, nunca en texto plano).</li>
<li><strong>Datos de aprendizaje:</strong> tu progreso en los cursos, los resultados de los ejercicios, las rachas y tus preferencias, que se usan para personalizar tu experiencia.</li>
<li><strong>Información de pago:</strong> si realizas una compra o te suscribes, el pago lo procesa directamente Stripe. No almacenamos los datos completos de tu tarjeta en nuestros servidores.</li>
<li><strong>Datos de uso:</strong> tipo de dispositivo, interacciones con la aplicación y zona horaria, que se usan para mejorar el Servicio y calcular correctamente las rachas diarias.</li>
</ul>
<h2>2. Cómo usamos tu información</h2>
<p>Usamos tu información para prestar y mejorar el Servicio, personalizar el contenido de tus cursos, procesar pagos, comunicarte novedades importantes y mantener la seguridad de tu cuenta.</p>
<h2>3. Con quién compartimos tu información</h2>
<p>No vendemos tus datos personales. Solo los compartimos con proveedores de confianza que nos ayudan a operar el Servicio (como Stripe para los pagos y nuestro proveedor de correo para la verificación de cuentas), y únicamente en la medida necesaria para que presten sus servicios.</p>
<h2>4. Conservación de datos</h2>
<p>Conservamos los datos de tu cuenta y de tu aprendizaje mientras la cuenta esté activa. Si eliminas tu cuenta, borraremos o anonimizaremos tus datos personales en un plazo razonable, salvo cuando la ley exija conservarlos.</p>
<h2>5. Tus derechos</h2>
<p>Puedes acceder a tus datos personales, corregirlos o solicitar su eliminación en cualquier momento desde los ajustes de tu perfil o poniéndote en contacto con nosotros. Según dónde residas, es posible que tengas derechos adicionales en virtud de normas como el RGPD o la CCPA.</p>
<h2>6. Privacidad de los menores</h2>
<p>LinguistPath no está dirigido a menores de 13 años y no recopilamos conscientemente datos personales de menores de esa edad.</p>
<h2>7. Seguridad</h2>
<p>Aplicamos medidas conformes a los estándares del sector, como el almacenamiento cifrado de contraseñas y el procesamiento seguro de pagos, para proteger tu información. Ningún método de transmisión por internet es 100 % seguro y no podemos garantizar una seguridad absoluta.</p>
<h2>8. Cambios en esta política</h2>
<p>Podemos actualizar esta política de privacidad cada cierto tiempo. Te avisaremos de los cambios importantes a través de la aplicación o por correo electrónico.</p>
<h2>9. Contacto</h2>
<p>Si tienes dudas sobre esta política o sobre cómo tratamos tus datos, visita nuestra página de <a href="/contact">Contacto</a>.</p>
HTML,
                ],
                'de' => [
                    'title' => 'Datenschutzerklärung',
                    'content' => <<<'HTML'
<p>Diese Datenschutzerklärung erläutert, wie LinguistPath („wir“) deine Daten erhebt, verwendet und schützt, wenn du unseren Dienst nutzt.</p>
<h2>1. Welche Daten wir erheben</h2>
<ul>
<li><strong>Kontodaten:</strong> Name, E-Mail-Adresse und Passwort (sicher gespeichert, niemals im Klartext).</li>
<li><strong>Lerndaten:</strong> dein Kursfortschritt, Übungsergebnisse, Serien und Einstellungen, die wir zur Personalisierung deines Lernerlebnisses verwenden.</li>
<li><strong>Zahlungsdaten:</strong> bei einem Kauf oder Abonnement wird die Zahlung direkt von Stripe abgewickelt. Vollständige Kartendaten speichern wir nicht auf unseren Servern.</li>
<li><strong>Nutzungsdaten:</strong> Gerätetyp, App-Interaktionen und Zeitzone, die wir zur Verbesserung des Dienstes und zur korrekten Berechnung der Tagesserien verwenden.</li>
</ul>
<h2>2. Wie wir deine Daten verwenden</h2>
<p>Wir verwenden deine Daten, um den Dienst bereitzustellen und zu verbessern, deine Kursinhalte zu personalisieren, Zahlungen abzuwickeln, dich über wichtige Neuerungen zu informieren und die Sicherheit deines Kontos zu gewährleisten.</p>
<h2>3. Weitergabe deiner Daten</h2>
<p>Wir verkaufen deine personenbezogenen Daten nicht. Wir geben sie nur an vertrauenswürdige Dienstleister weiter, die uns beim Betrieb des Dienstes unterstützen (etwa Stripe für die Zahlungsabwicklung und unseren E-Mail-Anbieter für die Kontobestätigung), und nur soweit dies zur Erbringung ihrer Leistungen erforderlich ist.</p>
<h2>4. Speicherdauer</h2>
<p>Wir speichern deine Konto- und Lerndaten, solange dein Konto aktiv ist. Wenn du dein Konto löschst, entfernen oder anonymisieren wir deine personenbezogenen Daten innerhalb eines angemessenen Zeitraums, sofern keine gesetzliche Aufbewahrungspflicht besteht.</p>
<h2>5. Deine Rechte</h2>
<p>Du kannst jederzeit über deine Profileinstellungen oder durch Kontaktaufnahme mit uns auf deine personenbezogenen Daten zugreifen, sie berichtigen oder ihre Löschung verlangen. Je nach Wohnort können dir weitere Rechte nach Vorschriften wie der DSGVO oder dem CCPA zustehen.</p>
<h2>6. Datenschutz von Kindern</h2>
<p>LinguistPath richtet sich nicht an Kinder unter 13 Jahren, und wir erheben wissentlich keine personenbezogenen Daten von Kindern unter diesem Alter.</p>
<h2>7. Sicherheit</h2>
<p>Wir setzen branchenübliche Maßnahmen ein, darunter verschlüsselte Passwortspeicherung und sichere Zahlungsabwicklung, um deine Daten zu schützen. Keine Übertragungsmethode im Internet ist zu 100 % sicher, und eine absolute Sicherheit können wir nicht garantieren.</p>
<h2>8. Änderungen dieser Erklärung</h2>
<p>Wir können diese Datenschutzerklärung von Zeit zu Zeit aktualisieren. Über wesentliche Änderungen informieren wir dich in der App oder per E-Mail.</p>
<h2>9. Kontakt</h2>
<p>Bei Fragen zu dieser Datenschutzerklärung oder zum Umgang mit deinen Daten besuche bitte unsere Seite <a href="/contact">Kontakt</a>.</p>
HTML,
                ],
                'ja' => [
                    'title' => 'プライバシーポリシー',
                    'content' => <<<'HTML'
<p>本プライバシーポリシーは、お客様が当社のサービスをご利用になる際に、LinguistPath（以下「当社」）がどのように情報を収集・利用し、保護するかを説明するものです。</p>
<h2>1. 収集する情報</h2>
<ul>
<li><strong>アカウント情報：</strong>氏名、メールアドレス、パスワード（安全に保管され、平文で保存されることはありません）。</li>
<li><strong>学習データ：</strong>コースの進捗、演習の結果、連続記録、各種設定。学習体験をパーソナライズするために利用します。</li>
<li><strong>決済情報：</strong>購入またはサブスクリプションのお申し込みの際、決済は Stripe が直接処理します。カード情報の全体を当社のサーバーに保存することはありません。</li>
<li><strong>利用データ：</strong>端末の種類、アプリの操作履歴、タイムゾーン。サービスの改善と連続記録の正確な集計に利用します。</li>
</ul>
<h2>2. 情報の利用目的</h2>
<p>当社は、サービスの提供と改善、コース内容のパーソナライズ、決済処理、重要なお知らせの通知、アカウントの安全確保のために情報を利用します。</p>
<h2>3. 情報の共有</h2>
<p>当社がお客様の個人情報を販売することはありません。サービスの運営を支援する信頼できる事業者（決済処理の Stripe、アカウント確認のためのメール配信事業者など）に対して、業務の遂行に必要な範囲でのみ共有します。</p>
<h2>4. データの保存期間</h2>
<p>アカウントが有効である間、アカウント情報と学習データを保存します。アカウントを削除された場合、法令により保存が義務付けられている場合を除き、合理的な期間内に個人情報を削除または匿名化します。</p>
<h2>5. お客様の権利</h2>
<p>プロフィール設定からいつでも個人データの確認・修正・削除の請求ができます。お問い合わせいただくことも可能です。お住まいの地域によっては、GDPR や CCPA などの法令に基づく追加の権利が認められる場合があります。</p>
<h2>6. お子様のプライバシー</h2>
<p>LinguistPath は 13 歳未満のお子様を対象としておらず、当該年齢未満のお子様から意図的に個人情報を収集することはありません。</p>
<h2>7. セキュリティ</h2>
<p>当社は、パスワードの暗号化保存や安全な決済処理を含む業界標準の対策を講じて情報を保護しています。インターネット上の通信手段で 100% 安全なものは存在せず、完全な安全性を保証することはできません。</p>
<h2>8. 本ポリシーの変更</h2>
<p>本プライバシーポリシーは随時更新されることがあります。重要な変更については、アプリまたはメールでお知らせします。</p>
<h2>9. お問い合わせ</h2>
<p>本ポリシーやデータの取り扱いについてご不明な点がある場合は、<a href="/contact">お問い合わせ</a>ページをご覧ください。</p>
HTML,
                ],
                'ko' => [
                    'title' => '개인정보 처리방침',
                    'content' => <<<'HTML'
<p>본 개인정보 처리방침은 LinguistPath(이하 "당사")가 서비스 이용 과정에서 이용자의 정보를 어떻게 수집·이용하고 보호하는지 설명합니다.</p>
<h2>1. 수집하는 정보</h2>
<ul>
<li><strong>계정 정보:</strong> 이름, 이메일 주소, 비밀번호(안전하게 저장되며 평문으로 보관되지 않습니다).</li>
<li><strong>학습 데이터:</strong> 코스 진행 상황, 연습 결과, 연속 학습 기록, 환경설정. 학습 경험을 개인화하는 데 사용됩니다.</li>
<li><strong>결제 정보:</strong> 구매하거나 구독하는 경우 결제는 Stripe가 직접 처리합니다. 당사는 카드 전체 정보를 서버에 저장하지 않습니다.</li>
<li><strong>이용 데이터:</strong> 기기 종류, 앱 사용 기록, 시간대. 서비스 개선과 연속 학습 기록의 정확한 계산에 사용됩니다.</li>
</ul>
<h2>2. 정보의 이용 목적</h2>
<p>당사는 서비스 제공 및 개선, 코스 콘텐츠 개인화, 결제 처리, 중요 안내 전달, 계정 보안 유지를 위해 정보를 이용합니다.</p>
<h2>3. 정보의 제공</h2>
<p>당사는 이용자의 개인정보를 판매하지 않습니다. 서비스 운영을 돕는 신뢰할 수 있는 업체(결제 처리를 위한 Stripe, 계정 인증을 위한 이메일 발송 업체 등)에 한하여, 해당 업무 수행에 필요한 범위에서만 제공합니다.</p>
<h2>4. 보유 기간</h2>
<p>계정이 활성 상태인 동안 계정 정보와 학습 데이터를 보관합니다. 계정을 삭제하면 법령에서 보관을 요구하는 경우를 제외하고 합리적인 기간 내에 개인정보를 삭제하거나 익명 처리합니다.</p>
<h2>5. 이용자의 권리</h2>
<p>프로필 설정에서 언제든지 개인정보를 열람·정정하거나 삭제를 요청할 수 있으며, 당사에 문의하셔도 됩니다. 거주 지역에 따라 GDPR, CCPA 등 관련 법령에 따른 추가 권리가 인정될 수 있습니다.</p>
<h2>6. 아동의 개인정보</h2>
<p>LinguistPath는 만 13세 미만 아동을 대상으로 하지 않으며, 해당 연령 미만 아동의 개인정보를 고의로 수집하지 않습니다.</p>
<h2>7. 보안</h2>
<p>당사는 비밀번호의 암호화 저장과 안전한 결제 처리를 포함한 업계 표준 조치를 통해 정보를 보호합니다. 인터넷을 통한 전송 방식 중 100% 안전한 것은 없으므로 절대적인 보안을 보장할 수는 없습니다.</p>
<h2>8. 방침의 변경</h2>
<p>본 개인정보 처리방침은 수시로 업데이트될 수 있습니다. 중요한 변경 사항은 앱 또는 이메일로 안내해 드립니다.</p>
<h2>9. 문의하기</h2>
<p>본 방침이나 데이터 처리 방식에 대해 궁금한 점이 있으시면 <a href="/contact">문의하기</a> 페이지를 방문해 주세요.</p>
HTML,
                ],
                'tr' => [
                    'title' => 'Gizlilik Politikası',
                    'content' => <<<'HTML'
<p>Bu Gizlilik Politikası, Hizmet'imizi kullandığınızda LinguistPath'in ("biz") bilgilerinizi nasıl topladığını, kullandığını ve koruduğunu açıklar.</p>
<h2>1. Topladığımız Bilgiler</h2>
<ul>
<li><strong>Hesap bilgileri:</strong> ad, e-posta adresi ve parola (güvenli biçimde saklanır, hiçbir zaman düz metin olarak tutulmaz).</li>
<li><strong>Öğrenme verileri:</strong> kurs ilerlemeniz, alıştırma sonuçlarınız, serileriniz ve tercihleriniz; öğrenme deneyiminizi kişiselleştirmek için kullanılır.</li>
<li><strong>Ödeme bilgileri:</strong> satın alma yapar veya abone olursanız ödeme doğrudan Stripe tarafından işlenir. Kart bilgilerinizin tamamını sunucularımızda saklamayız.</li>
<li><strong>Kullanım verileri:</strong> cihaz türü, uygulama etkileşimleri ve saat dilimi; Hizmet'i geliştirmek ve günlük serileri doğru hesaplamak için kullanılır.</li>
</ul>
<h2>2. Bilgilerinizi Nasıl Kullanıyoruz</h2>
<p>Bilgilerinizi Hizmet'i sunmak ve geliştirmek, kurs içeriğinizi kişiselleştirmek, ödemeleri işlemek, önemli güncellemeleri iletmek ve hesabınızın güvenliğini sağlamak için kullanırız.</p>
<h2>3. Bilgilerinizin Paylaşılması</h2>
<p>Kişisel bilgilerinizi satmayız. Verilerinizi yalnızca Hizmet'i işletmemize yardımcı olan güvenilir hizmet sağlayıcılarla (ödeme işlemleri için Stripe, hesap doğrulaması için e-posta sağlayıcımız gibi) ve yalnızca hizmetlerini yerine getirmeleri için gerekli ölçüde paylaşırız.</p>
<h2>4. Verilerin Saklanması</h2>
<p>Hesabınız etkin olduğu sürece hesap ve öğrenme verilerinizi saklarız. Hesabınızı silerseniz, mevzuatın saklamayı zorunlu kıldığı haller dışında kişisel bilgilerinizi makul bir süre içinde sileriz veya anonim hale getiririz.</p>
<h2>5. Haklarınız</h2>
<p>Kişisel verilerinize istediğiniz zaman Profil ayarlarınızdan erişebilir, bunları düzeltebilir veya silinmesini talep edebilirsiniz; bize ulaşarak da bunu yapabilirsiniz. Bulunduğunuz yere bağlı olarak GDPR veya CCPA gibi mevzuat kapsamında ek haklarınız olabilir.</p>
<h2>6. Çocukların Gizliliği</h2>
<p>LinguistPath 13 yaşın altındaki çocuklara yönelik değildir ve bu yaşın altındaki çocuklardan bilerek kişisel bilgi toplamayız.</p>
<h2>7. Güvenlik</h2>
<p>Bilgilerinizi korumak için şifrelenmiş parola saklama ve güvenli ödeme işleme dahil olmak üzere sektör standardı önlemler uygularız. İnternet üzerinden yapılan hiçbir aktarım yöntemi %100 güvenli değildir ve mutlak güvenliği garanti edemeyiz.</p>
<h2>8. Bu Politikadaki Değişiklikler</h2>
<p>Bu Gizlilik Politikası'nı zaman zaman güncelleyebiliriz. Önemli değişiklikleri uygulama üzerinden veya e-posta ile size bildiririz.</p>
<h2>9. Bize Ulaşın</h2>
<p>Bu Gizlilik Politikası veya verilerinizin işlenme şekli hakkında sorularınız varsa lütfen <a href="/contact">Bize Ulaşın</a> sayfamızı ziyaret edin.</p>
HTML,
                ],
                'ru' => [
                    'title' => 'Политика конфиденциальности',
                    'content' => <<<'HTML'
<p>Настоящая Политика конфиденциальности объясняет, как LinguistPath («мы») собирает, использует и защищает вашу информацию при использовании Сервиса.</p>
<h2>1. Какие данные мы собираем</h2>
<ul>
<li><strong>Данные учётной записи:</strong> имя, адрес электронной почты и пароль в зашифрованном виде.</li>
<li><strong>Данные обучения:</strong> пройденные уроки, полученный опыт, серии дней, достижения и результаты упражнений.</li>
<li><strong>Данные о покупках:</strong> история операций. Реквизиты карт обрабатываются Stripe и никогда не хранятся на наших серверах.</li>
<li><strong>Технические данные:</strong> тип устройства, версия приложения и базовая диагностика.</li>
</ul>
<h2>2. Как мы используем данные</h2>
<p>Мы используем эти данные, чтобы вести ваш учебный прогресс, персонализировать занятия, обрабатывать покупки, отправлять напоминания о занятиях, если вы на них согласились, и улучшать Сервис.</p>
<h2>3. Передача данных</h2>
<p>Мы не продаём ваши персональные данные. Мы передаём их только поставщикам услуг, необходимым для работы Сервиса, — например, Stripe для платежей и нашему почтовому провайдеру, — а также когда этого требует закон.</p>
<h2>4. Хранение данных</h2>
<p>Мы храним данные вашей учётной записи, пока она активна. После удаления учётной записи ваши персональные данные удаляются, за исключением записей об операциях, которые мы обязаны хранить по закону.</p>
<h2>5. Ваши права</h2>
<p>Вы можете запросить доступ к своим данным, их исправление или удаление, а также отказаться от маркетинговых сообщений. В зависимости от места проживания у вас могут быть дополнительные права по GDPR или CCPA.</p>
<h2>6. Безопасность</h2>
<p>Мы применяем шифрование при передаче данных, хешируем пароли и ограничиваем доступ к личным данным. Ни одна система не защищена полностью, но мы серьёзно относимся к их защите.</p>
<h2>7. Дети</h2>
<p>Сервис не предназначен для детей младше 13 лет. Если мы узнаем, что собрали данные ребёнка младше 13 лет, мы удалим их.</p>
<h2>8. Изменения политики</h2>
<p>Мы можем обновлять настоящую Политику. О существенных изменениях мы сообщим через приложение или по электронной почте.</p>
<h2>9. Связь с нами</h2>
<p>По вопросам конфиденциальности пишите нам через страницу «Контакты».</p>
HTML,
                ],
                'ar' => [
                    'title' => 'سياسة الخصوصية',
                    'content' => <<<'HTML'
<p>توضح سياسة الخصوصية هذه كيف يجمع LinguistPath («نحن») معلوماتك ويستخدمها ويحميها عند استخدامك للخدمة.</p>
<h2>1. البيانات التي نجمعها</h2>
<ul>
<li><strong>بيانات الحساب:</strong> الاسم والبريد الإلكتروني وكلمة المرور بصيغة مشفرة.</li>
<li><strong>بيانات التعلم:</strong> الدروس المكتملة ونقاط الخبرة والسلاسل اليومية والأوسمة ونتائج التمارين.</li>
<li><strong>بيانات الشراء:</strong> سجل المعاملات. تتم معالجة بيانات البطاقات عبر Stripe ولا تخزن على خوادمنا مطلقا.</li>
<li><strong>بيانات تقنية:</strong> نوع الجهاز وإصدار التطبيق ومعلومات تشخيصية أساسية.</li>
</ul>
<h2>2. كيف نستخدم البيانات</h2>
<p>نستخدم هذه البيانات لتتبع تقدمك التعليمي وتخصيص الدروس ومعالجة المشتريات وإرسال تذكيرات التعلم إذا وافقت عليها، ولتحسين الخدمة.</p>
<h2>3. مشاركة البيانات</h2>
<p>نحن لا نبيع بياناتك الشخصية. ولا نشاركها إلا مع مزودي الخدمات اللازمين لتشغيل الخدمة، مثل Stripe للمدفوعات ومزود البريد لدينا، وعندما يقتضي القانون ذلك.</p>
<h2>4. الاحتفاظ بالبيانات</h2>
<p>نحتفظ ببيانات حسابك ما دام نشطا. وبعد حذف الحساب تحذف بياناتك الشخصية، باستثناء سجلات المعاملات التي يلزمنا القانون بالاحتفاظ بها.</p>
<h2>5. حقوقك</h2>
<p>يمكنك طلب الاطلاع على بياناتك أو تصحيحها أو حذفها، وإلغاء الاشتراك في الرسائل التسويقية. وقد تكون لديك حقوق إضافية بموجب GDPR أو CCPA حسب مكان إقامتك.</p>
<h2>6. الأمان</h2>
<p>نستخدم التشفير أثناء النقل ونخزن كلمات المرور مشفرة ونقيد الوصول إلى البيانات الشخصية. لا يوجد نظام آمن تماما، لكننا نتعامل مع حمايتها بجدية.</p>
<h2>7. الأطفال</h2>
<p>الخدمة ليست موجهة للأطفال دون سن 13 عاما. وإذا علمنا أننا جمعنا بيانات طفل دون هذا السن فسنحذفها.</p>
<h2>8. تغييرات السياسة</h2>
<p>قد نحدث هذه السياسة. وسنبلغك بالتغييرات الجوهرية عبر التطبيق أو البريد الإلكتروني.</p>
<h2>9. التواصل معنا</h2>
<p>للاستفسارات المتعلقة بالخصوصية، راسلنا عبر صفحة «اتصل بنا».</p>
HTML,
                ],
                'az' => [
                    'title' => 'Məxfilik Siyasəti',
                    'content' => <<<'HTML'
<p>Bu Məxfilik Siyasəti LinguistPath-ın («biz») Xidmətdən istifadə etdiyiniz zaman məlumatlarınızı necə topladığını, istifadə etdiyini və qoruduğunu izah edir.</p>
<h2>1. Topladığımız məlumatlar</h2>
<ul>
<li><strong>Hesab məlumatları:</strong> ad, e-poçt ünvanı və şifrələnmiş formada parol.</li>
<li><strong>Təhsil məlumatları:</strong> tamamlanmış dərslər, qazanılan təcrübə xalları, gündəlik seriyalar, nişanlar və tapşırıq nəticələri.</li>
<li><strong>Alış məlumatları:</strong> əməliyyat tarixçəsi. Kart məlumatları Stripe tərəfindən emal olunur və heç vaxt serverlərimizdə saxlanılmır.</li>
<li><strong>Texniki məlumatlar:</strong> cihaz növü, tətbiq versiyası və əsas diaqnostika.</li>
</ul>
<h2>2. Məlumatlardan necə istifadə edirik</h2>
<p>Bu məlumatlardan tədris irəliləyişinizi izləmək, dərsləri fərdiləşdirmək, alışları emal etmək, razılıq verdiyiniz halda xatırlatmalar göndərmək və Xidməti təkmilləşdirmək üçün istifadə edirik.</p>
<h2>3. Məlumatların paylaşılması</h2>
<p>Şəxsi məlumatlarınızı satmırıq. Onları yalnız Xidmətin işləməsi üçün zəruri olan təchizatçılarla — məsələn ödənişlər üçün Stripe və e-poçt təchizatçımızla — və qanun tələb etdikdə paylaşırıq.</p>
<h2>4. Məlumatların saxlanması</h2>
<p>Hesabınız aktiv olduğu müddətdə məlumatlarınızı saxlayırıq. Hesab silindikdən sonra şəxsi məlumatlarınız silinir, qanunla saxlamalı olduğumuz əməliyyat qeydləri istisna olmaqla.</p>
<h2>5. Hüquqlarınız</h2>
<p>Məlumatlarınıza baxmağı, onları düzəltməyi və ya silməyi tələb edə, marketinq mesajlarından imtina edə bilərsiniz. Yaşadığınız yerdən asılı olaraq GDPR və ya CCPA üzrə əlavə hüquqlarınız ola bilər.</p>
<h2>6. Təhlükəsizlik</h2>
<p>Ötürülmə zamanı şifrələmədən istifadə edir, parolları heş formasında saxlayır və şəxsi məlumatlara girişi məhdudlaşdırırıq. Heç bir sistem tam təhlükəsiz deyil, lakin onların qorunmasına ciddi yanaşırıq.</p>
<h2>7. Uşaqlar</h2>
<p>Xidmət 13 yaşdan kiçik uşaqlar üçün nəzərdə tutulmayıb. 13 yaşdan kiçik uşağın məlumatlarını topladığımızı öyrənsək, onları siləcəyik.</p>
<h2>8. Siyasətdə dəyişikliklər</h2>
<p>Bu Siyasəti yeniləyə bilərik. Əhəmiyyətli dəyişikliklər barədə tətbiq və ya e-poçt vasitəsilə məlumat verəcəyik.</p>
<h2>9. Bizimlə əlaqə</h2>
<p>Məxfiliklə bağlı suallar üçün «Bizimlə əlaqə» səhifəsindən yazın.</p>
HTML,
                ],
            ],
        ];
    }
}
