<?
function generate_kanji_grid() {

	$raw_data = "
	取:take 独:single 自:self 淑:graceful 潜:submerge 六:six 株:stocks 庶:commoner 求:request 明:bright 景:scenery 氏:family_name 百:hundred 銘:inscription 十:ten 避:evade 上:above 却:instead 傾:lean 鐘:bell 
	術:art 庁:government_office 混:mix 価:value 気:spirit 悔:repent 庄:level 侮:scorn 詠:recitation 築:fabricate 相:inter- 絞:strangle 懐:pocket 遮:intercept 寡:widow 凍:frozen 警:admonish 啓:disclose 沸:seethe 斎:purification 
	砂:sand 合:fit 晃:clear 宮:palace 密:secrecy 起:rouse 楼:watchtower 伐:fell 畜:livestock 添:annexed 菓:candy 瀬:rapids 服:clothing 奎:star 為:do 露:dew 飢:hungry 奇:strange 頒:distribute 帯:sash 
	冴:be_clear 唱:chant 化:change 剤:dose 惜:pity 郊:outskirts 坑:pit 欲:longing 藻:seaweed 随:follow 匠:artisan 偉:admirable 保:protect 弥:increasingly 弱:weak 盲:blind 漂:drift 於:at 吉:good_luck 巨:gigantic 
	衷:inmost 負:defeat 斐:beautiful 箱:box 垣:hedge 酉:west 熟:mellow 家:house 非:un- 枯:wither 掘:dig 舌:tongue 鉄:iron 式:style 資:assets 懇:sociable 務:task 奉:observance 挑:challenge 浅:shallow 
	漏:leak 外:outside 雇:employ 技:skill 寝:lie_down 草:grass 課:chapter 強:strong 后:empress 曇:cloudy 同:same 算:calculate 琳:jewel 亘:span 漸:steadily 絵:picture 基:fundamentals 藩:clan 眠:sleep 昴:the_Pleiades 

	憤:aroused 距:long-distance 構:posture 夜:night 撲:slap 控:withdraw 塩:salt 古:old 漫:cartoon 老:old_man 通:traffic 誼:friendship 充:allot 洞:den 扶:aid 茉:jasmine 薬:medicine 関:connection 射:shoot 婚:marriage 
	作:make 満:full 速:quick 性:sex 族:tribe 采:dice 票:ballot 還:send_back 梨:pear_tree 吹:blow 並:row 槻:Zelkova_tree 森:forest 稲:rice_plant 横:sideways 菫:the_violet 耶:question_mark 険:precipitous 異:uncommon 惑:beguile 
	寒:cod 弐:two 絡:entwine 励:encourage 努:toil 蓉:lotus 遅:slow 颯:sudden 擦:grate 廉:bargain 子:child 岐:branch_off 置:placement 慣:accustomed 風:wind 島:island 涙:tears 猿:monkey 芋:potato 胴:trunk 
	僕:me 譜:musical_score 冷:cool 逓:relay 角:angle 繊:slender 写:copy 癖:mannerism 専:specialty 沢:swamp 泊:overnight_stay 埋:bury 劇:drama 帰:homecoming 砕:smash 便:convenience 魂:soul 丁:street 共:together 胎:womb 
	塀:fence 況:condition 輸:transport 塚:hillock 歌:song 誓:vow 舞:dance 用:utilize 搬:conveyor 財:property 任:responsibility 応:apply 枚:sheet_of... 硫:sulphur 既:previously 叫:shout 闘:fight 宙:mid-air 舗:shop 雌:feminine 
	幕:curtain 憲:constitution 率:ratio 線:line 防:ward_off 累:accumulate 広:wide 臓:entrails 費:expense 衣:garment 暦:calendar 優:tenderness 覚:memorize 歓:delight 泳:swim 睦:intimate 居:reside 船:ship 完:perfect 描:sketch 

	番 忙 互 巽 呈 訴 燎 喜 艇 妙 澄 翻 欽 方 亭 胡 偽 宜 貞 眺 
	勤 例 霧 昆 鑑 狂 免 革 魔 窓 券 物 著 葬 欄 舎 毅 戻 皐 岸 
	長 繁 甚 柳 綜 虞 足 貯 窯 惰 孤 黙 虚 恕 胸 棚 奮 捕 浄 亜 
	秋 内 題 均 莞 秒 雛 釣 祝 油 杉 笑 植 渇 礎 振 狩 紅 刀 罰 
	靴 快 羅 陣 矢 切 話 越 肺 皆 頂 富 児 賃 派 送 舜 遭 卵 麻 
	桑 病 据 惨 飽 拳 遥 宿 勢 虐 縁 口 王 伏 茎 守 輔 彼 抜 湧 

	郡 裟 戒 鎮 致 窮 把 語 村 易 危 納 押 目 詳 巌 綱 管 拓 永 
	履 討 栗 甘 酬 千 脩 午 有 湖 約 雰 肉 候 製 厳 滉 巳 又 詰 
	漆 教 棺 稚 郵 尚 縮 慢 皓 竹 走 試 許 沙 宣 徴 尋 粛 踏 蔵 
	胤 某 雄 命 悼 鳳 醸 山 創 侯 碧 詐 批 廊 鯉 比 拝 裏 羽 摂 
	原 拙 爆 綸 第 濫 整 煩 罪 鈴 以 拷 畳 消 烈 湾 雪 逐 院 佑 
	男 芸 透 市 援 事 酸 査 尾 酵 乾 嫡 赴 紫 循 怒 影 圧 崎 休 

	周 翔 麟 磁 鋼 調 苑 耳 悦 界 囚 且 峡 益 貝 佐 凶 玖 響 予 
	茜 乃 理 瓶 勝 閑 記 河 科 驚 簿 途 武 友 紘 弁 僧 燿 指 悪 
	飼 付 授 霞 筋 槙 帳 悲 新 獲 億 系 軸 陰 襟 槽 乏 藍 鶏 楠 
	娯 嵩 桜 序 精 愛 怪 刑 員 腸 換 称 喚 去 碩 庫 確 冬 勇 規 
	宝 働 隼 路 刃 液 悠 蘭 組 木 劾 染 褒 我 盗 吟 想 彩 官 福 
	彬 舶 屈 鳴 色 向 変 像 聡 条 仙 亨 硬 顔 荒 延 黛 朔 寅 噴 

	替 轄 除 繕 巴 柊 辰 音 揮 滴 宇 俊 人 告 伴 鷹 医 唄 野 蕗 
	須 覆 機 瑚 騒 措 貿 燃 皿 阻 供 渉 垂 省 右 仕 逆 智 燦 禁 
	局 幹 召 卸 酷 則 工 私 改 眉 怠 峰 端 腰 穀 月 惣 妨 力 玲 
	茂 最 超 示 空 叶 是 座 伽 権 民 亡 青 倉 渚 経 玄 贈 枠 筒 
	軽 装 世 意 洋 息 敗 掛 幾 招 菖 利 井 達 引 制 姿 苗 浦 磨 
	拒 椋 会 雑 浸 惇 斥 汽 閣 転 品 閥 該 健 刈 験 者 薄 喝 近 

	塾 彫 麦 札 猟 朋 定 幻 衿 配 奴 柔 声 低 匹 看 浩 際 限 抽 
	水 誘 聴 勁 頭 乗 回 熙 俸 金 攻 林 伸 債 門 能 肇 蚊 緯 蚕 
	夕 拘 加 依 給 諄 格 短 凹 忌 党 襲 壇 鎌 好 街 漁 壊 昔 次 
	損 睡 栽 層 証 藤 対 騎 深 郎 喫 灰 柄 俗 冗 飾 稀 欧 節 脈 
	洲 傑 允 菊 盾 宰 池 蕉 頑 愁 岳 紗 餓 斜 斤 倖 机 握 琴 譲 
	助 店 体 紺 糧 宗 末 旭 肢 狭 失 杜 評 姫 艦 錠 顧 沼 恥 践 

	花 蛇 絃 測 住 少 即 昼 酪 潟 閉 墨 度 渥 尊 図 介 婦 魅 銭 
	慶 問 前 扱 嫌 慈 旬 駒 疲 暁 果 獄 督 旋 抵 障 晶 情 伶 夏 
	左 帽 柾 渦 濃 模 堂 謝 盤 停 忠 弾 請 夢 泡 脳 粒 弦 器 往 
	駅 静 敏 秦 辺 難 捷 曹 枝 殿 駿 痴 咲 漬 虫 泉 斗 駄 椎 黎 
	乙 範 先 妻 阿 旦 倣 志 様 料 質 妊 農 羊 塑 妄 態 呼 護 謡 
	諒 統 双 崚 憎 細 冶 媒 猪 剛 麿 坂 兵 曜 二 鼻 寸 孫 朽 争 

	姻 祥 冊 普 款 西 裕 土 竜 仏 誕 述 推 嚇 侍 衆 挙 訳 航 緊 
	酔 架 味 亮 朗 採 根 戯 九 稿 陳 粋 侑 邪 頌 備 彪 未 丙 樹 
	謹 習 撮 企 盆 潤 仲 幽 逃 諾 赳 略 房 邑 鉱 碁 閲 毛 墓 劣 
	爵 衡 肖 昭 入 跳 覇 泥 璃 矛 患 識 搾 謙 導 収 敬 痛 瑳 具 
	恒 姓 脚 捺 恋 笹 数 委 匿 穂 但 絹 殴 執 国 韻 生 乳 誉 網 
	虜 揚 崇 慮 顕 扇 茄 聖 究 蛍 令 緑 込 効 敵 嵯 郁 嘆 穣 拡 

	封 真 諸 祐 鍛 晏 刊 柱 額 逝 群 奨 卯 倍 決 弘 汰 片 怜 廃 
	甫 赦 巣 憧 瑶 被 等 薫 疎 坪 衛 旅 杯 環 央 憾 恐 賊 産 針 
	賦 懲 迫 粗 堀 靖 解 辱 位 紹 嫁 挟 翌 礁 偏 逮 着 倭 厘 緩 
	陪 字 済 返 功 和 侃 交 星 微 潔 若 飯 汁 断 選 錦 貢 抑 倹 
	隆 処 錯 尉 吐 疾 也 士 善 扉 棒 濯 感 賄 庭 特 何 笛 紡 糖 
	波 単 康 期 俳 極 象 覧 偲 印 猛 雷 猫 崩 没 那 騰 殺 境 恨 

	杏 丘 隊 吏 標 苦 町 醜 征 詔 五 凌 如 墾 蝶 渓 津 焦 板 紋 
	論 犬 就 朱 禅 伍 奏 刻 宵 疑 部 爽 秩 曙 黄 米 脱 京 州 溝 
	滅 困 恵 堕 桟 綾 慨 峻 飲 怖 遂 窒 械 悟 剰 総 栓 縦 皇 区 
	炊 紛 程 否 炉 涯 借 堤 松 労 鏡 娠 媛 鉛 択 及 濁 湿 材 概 
	拍 提 間 計 城 撤 伎 抄 岬 中 詢 伯 蒼 集 今 暗 俵 禍 源 因 
	安 綿 陛 球 晟 鶴 抹 憶 冠 亀 邸 惟 答 儀 剖 遼 才 階 造 掲 

	黒 威 高 昨 慰 名 焼 哉 駆 種 併 展 戸 核 絢 溶 銀 衰 裂 瑞 
	袈 辞 放 欣 擬 樺 煙 句 朝 勅 嬉 兆 療 籍 敷 豆 銅 呉 御 促 
	誠 赤 手 忘 歳 煮 始 倫 状 属 流 飛 磯 席 将 浪 束 募 差 太 
	行 早 礼 耕 燥 硝 尺 至 仁 止 幅 痘 偶 複 立 続 講 晴 追 夫 
	暉 案 震 陸 瞳 降 量 布 兼 紳 発 操 所 載 日 霊 仰 義 豪 芽 
	挿 賀 爾 己 匁 汐 小 唇 娘 瞭 傷 父 昌 袋 従 得 過 滝 検 抗 

	棄 再 郷 修 租 兄 託 署 菌 演 鴻 嘉 陽 買 較 賢 輝 析 浴 舟 
	縛 育 形 叙 洪 葵 匡 殉 尽 奪 型 僚 落 蒸 汗 背 職 貴 考 視 
	婿 庸 訟 姉 澪 司 翁 読 痢 尭 包 適 暑 維 玉 復 佳 肪 毒 祉 
	栄 漱 縄 尿 謄 腹 妃 枢 縫 割 担 似 含 打 蓮 斉 陶 童 喬 洸 
	廷 順 沈 掌 孔 徒 江 泰 鋳 渋 注 碑 役 髄 筆 李 海 久 賜 菜 
	勺 朕 暮 橘 泌 公 粉 毬 虹 酌 銑 美 諮 魁 穫 念 梧 洗 伺 魚 

	圏 篤 殻 柚 侵 違 件 暖 髪 預 融 銃 涼 漠 親 突 簡 雲 祈 営 
	朴 秘 港 動 誌 主 繰 褐 弧 宅 酢 遍 表 恭 症 承 肌 慕 芳 軒 
	録 死 心 別 当 審 踊 鹿 峠 底 愚 遊 詩 臣 貧 牲 旧 晋 不 牛 
	寛 喪 犯 嶺 都 卑 矯 鮮 橋 研 多 鮎 壁 括 東 使 三 師 各 遣 
	旺 獣 悌 政 徹 虎 芝 薪 災 戦 希 紬 蔦 遠 責 桃 域 要 石 華 
	客 丑 壮 編 啄 隠 願 敦 段 拐 寂 迪 胆 屋 厚 奔 胞 滞 個 疫 

	滋 懸 歯 徳 知 現 膨 暢 迭 升 到 晨 支 待 貫 終 接 代 盟 脹 
	張 奈 腕 囲 列 馬 副 肩 温 亦 余 趣 購 香 肯 郭 幣 笙 汚 寺 
	榛 隷 嘱 県 圭 塔 滑 電 卓 春 奥 賠 締 宏 継 携 届 救 泣 綺 
	楽 齢 穴 補 鳩 暇 罷 瑛 盛 披 眼 拾 紀 慧 叔 川 箇 謀 摩 元 
	氷 畝 留 面 値 八 鋭 下 琉 迅 鳥 悩 麗 道 薦 捜 梅 恩 運 陥 
	良 般 本 遵 平 殖 擁 君 賓 彗 連 参 稼 隣 博 蓄 豚 凝 刺 準 

	伊 忍 凜 昂 建 符 糾 撃 臨 霜 文 厄 荷 診 鉢 軌 膚 曲 販 偵 
	寮 占 鈍 結 賞 円 欠 豊 頻 幸 田 傘 附 出 殊 貨 掃 実 棋 琢 
	暴 設 拠 稜 棟 議 芙 弓 唆 迎 瑠 哀 織 旨 鯛 伝 憂 破 歴 観 
	干 隔 典 隅 倒 宴 禄 弟 揺 翠 墳 鎖 鼓 剣 登 詞 来 蛮 脂 社 
	地 膜 学 躍 辛 梢 牧 陵 肝 遷 糸 頼 墜 皮 正 減 勉 散 係 光 
	勧 室 輩 酒 見 七 裁 持 亥 椿 遺 法 緋 索 初 茅 堪 訓 誤 雅 

	一 浜 売 謁 檀 班 床 業 首 競 卒 蒔 協 時 萌 骨 純 宥 軟 炭 
	全 由 吸 甲 清 契 談 晩 眸 馨 禎 婆 呂 場 活 校 帥 項 壱 鯨 
	邦 両 策 退 沖 探 賛 迷 週 然 隻 乱 貸 望 諭 半 凸 寧 缶 年 
	催 釈 跡 耐 訪 捨 章 歩 故 練 荘 暫 湯 離 浮 排 之 削 腐 級 
	績 察 嵐 胃 楊 園 団 台 淳 谷 穏 反 搭 紙 嬢 固 照 摘 払 積 
	女 壌 克 丸 書 商 折 熊 稔 鬼 史 熱 芹 耀 漢 号 叡 言 遇 大 

	茶 桂 凡 栞 径 愉 刷 直 慎 触 昇 欺 享 鵬 巻 血 儒 輪 錬 畔 
	治 仮 塗 税 緒 帝 季 衝 領 類 妥 進 償 抱 害 帆 訂 興 沿 与 
	萩 珠 椰 珍 渡 塁 北 激 他 尼 零 誇 唯 楓 祖 神 府 報 重 投 
	常 丹 思 了 丞 点 巧 只 成 必 准 竣 艶 耗 凪 説 巡 信 癒 駐 
	彰 後 勘 猶 急 彦 寄 在 映 灯 存 犠 岩 四 敢 秀 施 孟 逸 粘 
	桐 幼 妹 律 塊 受 凱 嗣 移 旗 屯 申 冒 堅 梓 砲 潮 哲 画 葉 

	需 祭 側 軍 翼 開 残 容 脅 鞠 淡 版 弊 培 瞬 絶 炎 臭 養 認 
	館 傍 憩 監 英 弔 徐 裸 素 勲 献 繭 洵 更 増 窃 判 肥 莉 錘
	";

	// Convert whitespace into normal spaces.
	$data = str_replace(array("\r", "\n", "\t"), array(' ', ' ', ' '), $raw_data);

	// Split on the space and extract anything that isn't a blank string.
	// Note that PHP uses 8-bit byte strings so treat each kanji as though
	// it's a sub string, not a character.
	$pieces = explode(' ', $data);
	$kanji = array();
	foreach ($pieces as $piece) {
		if (strlen($piece) > 0) {
			$parts = explode(':', $piece);
			$character = $parts[0];
			$meaning = count($parts) > 1 ? str_replace('_', ' ', trim($parts[1])) : '?';
			array_push($kanji, array('char' => $character, 'meaning' => $meaning));
		}
	}
	return $kanji;
}

?>