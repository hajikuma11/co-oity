<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Oityマニュアル</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta name="description" content="Oityのマニュアルぺージ">
  </head>
  <body>

    <header>
      <h1>Oityマニュアル</h1>
      <p1>Oityの使い方が乗っているヘルプページです。</p1>
    </header>

    <h2 class="syou">オイティーのメニュー画面の機能</h2>

    <table>
          <tr>
              <th>ボタン名</th>
              <th>機能説明</th>
          </tr>
          <tr>
              <td class="kotoba">週間天気予報</td>
              <td class="kinou">大阪府、京都府、兵庫県、和歌山県の各地域ごとの<br>週間天気予報を表示します。</td>
          </tr>
          <tr>
              <td class="kotoba">おーるなう</td>
              <td class="kinou">現在時刻を自動取得し、<br>現在時刻の各方面のバス時刻表を表示します。</td>
          </tr>
          <tr>
              <td class="kotoba">バス</td>
              <td class="kinou">各方面のバスの時刻表を確認できます。</td>
          </tr>
          <tr>
              <td class="kotoba">電車</td>
              <td class="kinou">各方面の電車の時刻表を確認できます。</td>
          </tr>
          <tr>
              <td class="kotoba">翻訳</td>
              <td class="kinou">google翻訳を楽に呼び出すことができます。</td>
          </tr>
          <tr>
              <td class="kotoba">ヘルプ</td>
              <td class="kinou">ヘルプページを表示します。</td>
          </tr>
    </table>

    <h3 class="syou">言葉を送ることで使用できる機能</h3>

    <p1 class="danraku">バス時刻表 表示機能</p1>
    <p2>
      <table>
            <tr>
                <th>反応する言葉</th>
                <th>機能説明</th>
                <th>例</th>
            </tr>
            <tr>
                <td class="kotoba"><span>数値+bu</span><br>6bu,7bu,8bu...20bu,21bu</td>
                <td class="kinou">指定した時間帯の<br><span>長尾駅発<br>北山中央行き</span><br>のバスの<span>時刻表</span>を表示します。</td>
                <td class="rei"><span>User</span>:「6bu」<br><span>Oity</span>:「6時12,34,56」<br>(※この時刻表は例えです)</td>
            </tr>
            <tr>
                <td class="kotoba"><span>数値+bd</span><br>6bd,7bd,8bd...21bd,22bd</td>
                <td class="kinou">指定した時間帯の<br><span>北山中央発<br>長尾駅行き</span><br>のバスの<span>時刻表</span>を表示します。</td>
                <td class="rei"><span>User</span>:「6bd」<br><span>Oity</span>:「6時12,34,56」<br>(※この時刻表は例えです)</td>
            </tr>
            <tr>
                <td class="kotoba"><span>数値+kd</span><br>10kd,11kd,12kd...18kd,19kd</td>
                <td class="kinou">指定した時間帯の<br><span>北山中央発<br>樟葉駅行き</span><br>のバスの<span>時刻表</span>を表示します。</td>
                <td class="rei"><span>User</span>:「10kd」<br><span>Oity</span>:「10時12,34,56」<br>(※この時刻表は例えです)</td>
            </tr>
            <tr>
                <td class="kotoba"><span>数値+ku</span><br>10ku,11ku,12ku...20ku,21ku</td>
                <td class="kinou">指定した時間帯の<br><span>樟葉駅発<br>北山中央行き</span><br>のバスの<span>時刻表</span>を表示します。</td>
                <td class="rei"><span>User</span>:「10ku」<br><span>Oity</span>:「10時12,34,56」<br>(※この時刻表は例えです)</td>
            </tr>
      </table>
    </p2>

    <p3 class="danraku">電車時刻表 表示機能</p3>
    <p4>
      <table>
            <tr>
                <th>反応する言葉</th>
                <th>機能説明</th>
                <th>例</th>
            </tr>
            <tr>
                <td class="kotoba"><span>k</span><br>き,京橋行き,京橋方面</td>
                <td class="kinou"><span>学研都市線の<br>京橋方面の<br>時刻表</span>を表示します</td>
                <td class="rei"><span>User</span>:「k」<br><span>Oity</span>:「11時区快:12,34,...<br>12時区快:12,34,...」<br>(※この時刻表は例えです)</td>
            </tr>
            <tr>
                <td class="kotoba"><span>m</span><br>木津方面,松井山手方面</td>
                <td class="kinou"><span>学研都市線の<br>京橋方面の<br>時刻表</span>を表示します</td>
                <td class="rei"><span>User</span>:「k」<br><span>Oity</span>:「11時区快:12,34,...<br>12時区快:12,34,...」<br>(※この時刻表は例えです)</td>
            </tr>
      </table>
    </p4>

    <p5 class="danraku">その他機能（主にＵＲＬ表示系）</p5>

    <p6>
      <table>
            <tr>
                <th>反応する言葉</th>
                <th>機能説明</th>
                <th>例</th>
            </tr>
            <tr>
                <td class="kotoba"><span>運行情報</span><br>運行状況,遅延情報</td>
                <td class="kinou"><span>Yahoo!路線情報の<br>近畿の運行情報の<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「運行情報」<br><span>Oity</span>:「URL」</td>
            </tr>
            <tr>
                <td class="kotoba"><span>蔵書</span><br>蔵書検索</td>
                <td class="kinou"><span>大阪工業大学の<br>図書館の<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「蔵書」<br><span>Oity</span>:「URL」</td>
            </tr>
            <tr>
                <td class="kotoba"><span>アンケート</span></td>
                <td class="kinou"><span>大阪工業大学の<br>アンケートページの<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「アンケート」<br><span>Oity</span>:「URL」</td>
            </tr>
            <tr>
                <td class="kotoba"><span>行事日程</span><br>行事日程表</td>
                <td class="kinou"><span>情報科学部の<br>行事日程の<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「行事日程」<br><span>Oity</span>:「URL」</td>
            </tr>
            <tr>
                <td class="kotoba"><span>学習支援</span><br>学習支援サイト</td>
                <td class="kinou"><span>大阪工業大学の<br>学習支援サイトの<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「学習支援」<br><span>Oity</span>:「URL」</td>
            </tr>
            <tr>
                <td class="kotoba"><span>出欠管理システム</span><br>出欠管理,出席管理</td>
                <td class="kinou"><span>大阪工業大学の<br>出欠管理システムの<br>ＵＲＬ</span>を表示します</td>
                <td class="rei"><span>User</span>:「出欠管理システム」<br><span>Oity</span>:「URL」</td>
            </tr>
      </table>
    </p6>

    <footer>
      コピーライトなど、ありませぬ。
    </footer>

  </body>
</html>
