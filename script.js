//Web elements
const displayText = document.getElementById('wordsWrapper')
const displayInput = document.getElementById('textInput') // Input Box
const displayTimer = document.getElementById('time') // Time Display
const displayWPM = document.getElementById('wpmDisplay') // wpm Display
const mainContent = document.getElementById('mainContent') // wpm Display
const footer = document.getElementById("footer")
const typingMode = document.getElementById("typingmode")
const hotkey  = document.getElementById("hotkey")
var timerStatus = false; // Turns on when user begins typing...
var check = null;
var sentenceLength = 50;
var sentence = []
var words = []
var currentWordNum = 0;
var time = 0;
var duration = 0;
var wpm = 0;
var count = 0
var lastWord = 0;
window.addEventListener('keydown', function (event) { //restart test if tab key
  // Check if the pressed key is the 'Tab' key (key code 9)
  if (event.key === 'Tab' || event.keyCode === 9) {
    // Prevent the default tab key behavior
    event.preventDefault();

    // restart typing test
    restart();

  }
});
if (getStorageItem("typingMode") == "words")
{
    sentenceLength = getStorageItem("words")
    time = 0;
}
if (getStorageItem("typingMode") == "time")
{
    sentenceLength = 200;
    time = getStorageItem("time");
}
function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
    document.location.reload();
}
function checkCookie(cName) {
    let name = getCookie(cName);
    if (name != "") {
        return true;
    } else {
        return false;
    }
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function findDistanceBetween(words)
{
    const placement = document.getElementsByClassName('word')[0]; //Only want 1 value in class list
    const firstWord = placement.getBoundingClientRect().y;
    for (let i = 0; i < words.length; i++)
    {
        const current = document.getElementsByClassName('word')[i]; //Only want 1 value in class list
        const currentWord = current.getBoundingClientRect().y;
        if (currentWord > firstWord)
        {
            return(currentWord -firstWord)
        }
    }
}
displayInput?.addEventListener('input', keystroke)
function keystroke() {
    moveCursor();
    let word = document.getElementsByClassName('current-word')[0] //Only want 1 value in class list
    let chars = word.querySelectorAll('letter')
    let inputChars = displayInput?.value.split('');
    let wordChars = word.innerText.split('');
    for (let i = 0; i < chars.length; i++) //need to remove previous when user deletes
    {
        chars[i].classList.remove("correct")
        chars[i].classList.remove("incorrect")
    }
    for (let i = 0; i < displayInput?.value.length && i < chars.length; i++) //use input length (Only check however many you actually typed in not the whole word) ALSO cannot be longer than the word
    {
        if (inputChars.length <= wordChars.length) //extra characters
        {
            if (inputChars[i] == wordChars[i]) {
                chars[i].classList.add("correct") //right letter
                //changing the caret position
            }
            else if (inputChars[i] == " ") //skip spaces
            {
                continue;
            }
            else {
                chars[i].classList.add("incorrect") //wrong letter

                //changing the caret position
            }
        }
        else // in the case that there are extra letters but you still need to underline the first ones
        {
            if (i < chars.length) {
                if (inputChars[i] == wordChars[i]) {
                    chars[i].classList.add("correct")
                }
                else {
                    chars[i].classList.add("incorrect")
                }
            }
        }
    }
    //index is which word they are on as well
    //what this does is look for a seperation in the top px.
    //if the current word is lower than the last word than they need to shift down (:

    if (inputChars[inputChars.length - 1] == " ") //Checking for space bar on the last entered character ALSO runs a check to see if the word was spelled right or not
    {
        displayInput.value = ""; //reset the typing input box
        words[currentWordNum].className = 'word'; //start out thinking the word is right
        if (inputChars.length < chars.length + 1) //word is too short
        {
            wrongWord(words, chars)
        }
        for (let i = 0; i < inputChars.length - 1; i++) {
            try {
                if (!chars[i].classList.contains('correct')) //wrong
                {
                    wrongWord(words, chars);
                }
            } catch (TypeError) { //wrong also because too many letters
                wrongWord(words, chars)
            }
        }
        //CHECKING TO SEE IF ON NEXT LINE (should probably make a function)
        currentWordNum++;
        words[currentWordNum].className = 'current-word';
        //restart animatioin
        const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
        const currentWordIndex = Array.from(
            placement.parentElement.children
        ).indexOf(placement);
        const lastWordIndex = currentWordIndex - 1;
        if (lastWordIndex >= 0) //cannot be negative
        {
            const distance = findDistanceBetween(words); //distance between the lines
            const currentWord = placement.getBoundingClientRect().y;
            const firstWord = document.getElementsByClassName('word')[0].getBoundingClientRect().y;
            const lineCount = getStorageItem("lineCount")
            if (distance * (lineCount - 1) <= (currentWord - firstWord)) //return the one before last
            {
                displayText.style.marginTop = (distance * (lineCount - 2)) - (currentWord - firstWord) + "px";
            }
        }
        //moving the cursor
        moveCursorWithY();
    }
    //remove extras
    if (inputChars.length > chars.length - 1) //extra characters
    {
        const elements = document.getElementsByClassName('extra');
        while (elements.length > 0) {
            elements[0].parentNode.removeChild(elements[0]);
        }
        for (let i = 0; i < inputChars.length - chars.length; i++) {
            const letter = document.createElement('extra')
            letter.classList.add("extra")
            let inputLength = inputChars.length - chars.length
            letter.innerText = (displayInput?.value.substring(chars.length + i, chars.length + i + 1))
            word.appendChild(letter)

        }
        moveCursor();
    }
    var currentWord = displayText?.getElementsByClassName('current-word')[0];
    if (currentWord == lastWord && inputChars[inputChars.length - 1] != " ") //dont include space
    {
        var last = currentWord.querySelectorAll('letter')
        var lastLetter = last[last.length - 1]
        if (lastLetter.classList.contains('correct') || lastLetter.classList.contains('incorrect')) //the last letter can be both correct or incorrect
        {
            endTest()
        }
    }
}
function restart() {
    displayText.style.marginTop = 0; //reset the box for the text (since it moves up for each new line)
    clearInterval(check);
    currentWordNum = 0;
    timerStatus = false;
    displayWPM.innerHTML = '0 wpm';
    displayTimer.innerText = getTime(getStorageItem("time"));
    displayInput.focus();
    displayInput.value = "";
    footer.classList.remove('fadeOut');
    typingMode.classList.remove('fadeOut');
    hotkey.classList.remove('fadeOut');
    refresh();
}
function randomQuote() {
    displayText.innerText = ''// removing previous sentence if applicable
    var wordlist = [];
    if (getStorageItem("mode") == "easy") {
        wordList = ["the", "be", "to", "of", "and", "a", "in", "that", "have", "I", "it", "for", "not", "on", "with", "he", "as", "you", "do", "at", "this", "but", "his", "by", "from", "they", "we", "say", "her", "she", "or", "an", "will", "my", "one", "all", "would", "there", "their", "what", "so", "up", "out", "if", "about", "who", "get", "which", "go", "me", "when", "make", "can", "like", "time", "no", "just", "him", "know", "take", "people", "into", "year", "your", "good", "some", "could", "them", "see", "other", "than", "then", "now", "look", "only", "come", "its", "over", "think", "also", "back", "after", "use", "two", "how", "our", "work", "first", "well", "way", "even", "new", "want", "because", "any", "these", "give", "day", "most", "us"]
    }
    else if (getStorageItem("mode") == "hard") {
        wordList = ["abolish, abortion, absence, absent, absorb, abstract, absurd, abundance, abuse, academy, accelerate, accent, acceptance, accessible, accidentally, accommodate, accomplish, accomplishment, accordance, accordingly, accountability, accountable, accountant, accounting, accumulate, accumulation, accuracy, accurately, accusation, accused, acid, acquisition, acre, activate, activation, activist, acute, adaptation, addiction, additionally, adequate, adequately, adhere, adjacent, adjust, adjustment, administer, administrative, administrator, admission, adolescent, adoption, adverse, advocate, aesthetic, affection, affordable, aftermath, aggression, agricultural, agriculture, aide, aids, albeit, alert, alien, align, alignment, alike, allegation, allege, allegedly, alliance, allocate, allocation, allowance, ally, alongside, altogether, aluminium, amateur, ambassador, ambulance, amend, amendment, amid, amusing, analogy, analyst, ancestor, anchor, angel, animation, annually, anonymous, anticipate, anxiety, apology, apparatus, appealing, appetite, applaud, applicable, applicant, appoint, appreciation, appropriately, arbitrary, architectural, archive, arena, arguably, arm, array, arrow, articulate, artwork, ash, aside, aspiration, aspire, assassination, assault, assemble, assembly, assert, assertion, asset, assign, assistance, assumption, assurance, assure, astonishing, asylum, atrocity, attachment, attain, attendance, attorney, attribute, auction, audio, audit, authentic, authorize, auto, automatic, automatically, autonomy, availability, await, awareness, awkward, backdrop, backing, backup, badge, bail, balanced, ballet, balloon, ballot, banner, bare, barely, bargain, barrel, basement, basket, bass, bat, battlefield, bay, beam, beast, behalf, beloved, bench, benchmark, beneath, beneficial, beneficiary, beside, besides, betray, bias, bid, bind, biography, biological, bishop, bizarre, blade, blanket, blast, bleed, blend, bless, blessing, blow, boast, bold, bombing, bonus, booking, boom, boost, bounce, bound, boundary, bow, breach, breakdown, breakthrough, breed, brick, briefly, broadband, broadcaster, broadly, browser, brutal, buck, buddy, buffer, bug, bulk, burden, bureaucracy, burial, burst, cabin, cabinet, calculation, canal, candle, canvas, capability, capitalism, capitalist, carbon, cargo, carriage, carve, casino, casual, casualty, catalogue, cater, cattle, caution, cautious, cave, cease, cemetery, certainty, certificate, challenging, chamber, championship, chaos, characterize, charm, charming, charter, chase, cheek, cheer, choir, chop, chronic, chunk, circuit, circulate, circulation, citizenship, civic, civilian, civilization, clarify, clarity, clash, classification, classify, cleaning, clerk, cliff, cling, clinic, clinical, clip, closure, cluster, coalition, coastal, cocktail, cognitive, coincide, coincidence, collaborate, collaboration, collective, collector, collision, colonial, colony, colourful, columnist, combat, comic, commander, commence, commentary, commentator, commerce, commissioner, commodity, communist, companion, comparable, comparative, compassion, compel, compelling, compensate, compensation, competence, competent, compile, complement, completion, complexity, compliance, complication, comply, compose, composer, composition, compound, comprehensive, comprise, compromise, compulsory, compute, conceal, concede, conceive, conception, concession, concrete, condemn, confer, confess, confession, configuration, confine, confirmation, confront, confrontation, confusion, congratulate, congregation, congressional, conquer, conscience, consciousness, consecutive, consensus, consent, consequently, conservation, conserve, considerable, considerably, consistency, consistently, consolidate, conspiracy, constituency, constitute, constitution, constitutional, constraint, consult, consultant, consultation, consumption, contemplate, contempt, contend, contender, content, contention, continually, contractor, contradiction, contrary, contributor, controversial, controversy, convenience, convention, conventional, conversion, convey, convict, conviction, convincing, cooperate, cooperative, coordinate, coordination, coordinator, cop, cope, copper, copyright, corporation, correction, correlate, correlation, correspond, correspondence, correspondent, corresponding, corridor, corrupt, corruption, costly, councillor, counselling, counsellor, counter, counterpart, countless, coup, courtesy, coverage, crack, craft, crawl, creativity, creator, credibility, credible, creep, critically, critique, crown, crude, cruise, crush, crystal, cue, cult, cultivate, curiosity, curious, curriculum, custody, cute, cutting, cynical, dairy, dam, damaging, dare, darkness, database, dawn, deadline, deadly, dealer, debris, debut, decision-making, decisive, deck, declaration, dedicated, dedication, deed, deem, default, defect, defender, defensive, deficiency, deficit, defy, delegate, delegation, delete, delicate, democracy, democratic, demon, demonstration, denial, denounce, dense, density, depart, dependence, dependent, depict, deploy, deployment, deposit, depression, deprive, deputy, derive, descend, descent, designate, desirable, desktop, desperately, destruction, destructive, detain, detection, detention, deteriorate, determination, devastate, devil, devise, devote, diagnose, diagnosis, dictate, dictator, differ, differentiate, dignity, dilemma, dimension, diminish, dip, diplomat, diplomatic, directory, disability, disabled, disagreement, disappoint, disappointment, disastrous, discard, discharge, disclose, disclosure, discourage, discourse, discretion, discrimination, dismissal, disorder, displace, disposal, dispose, dispute, disrupt, disruption, dissolve, distant, distinct, distinction, distinctive, distinguish, distort, distract, distress, disturb, disturbing, dive, diverse, diversity, divert, divine, divorce, doctrine, documentation, domain, dominance, dominant, donation, donor, dose, dot, downtown, drain, dramatically, drift, driving, drought, drown, dual, dub, dull, dumb, dump, duo, duration, dynamic, eager, earnings, ease, echo, ecological, economics, economist, editorial, educator, effectiveness, efficiency, efficiently, ego, elaborate, elbow, electoral, electronics, elegant, elementary, elevate, eligible, eliminate, elite, embark, embarrassment, embassy, embed, embody, embrace, emergence, emission, emotionally, empire, empirical, empower, enact, encompass, encouragement, encouraging, endeavour, endless, endorse, endorsement, endure, enforce, enforcement, engagement, engaging, enjoyable, enquire, enrich, enrol, ensue, enterprise, entertaining, enthusiast, entitle, entity, entrepreneur, envelope, epidemic, equality, equation, equip, equivalent, era, erect, erupt, escalate, essence, essentially, establishment, eternal, ethic, ethnic, evacuate, evaluation, evident, evoke, evolution, evolutionary, evolve, exaggerate, exceed, excellence, exception, exceptional, excess, excessive, exclude, exclusion, exclusive, exclusively, execute, execution, exert, exhibit, exile, exit, exotic, expansion, expenditure, experimental, expertise, expire, explicit, explicitly, exploit, exploitation, explosive, exposure, extension, extensive, extensively, extract, extremist, fabric, fabulous, facilitate, faction, faculty, fade, failed, fairness, fake, fame, fantasy, fare, fatal, fate, favourable, feat, federal, feeding, feminist, fever, fibre, fierce, film-maker, filter, fine, firearm, firefighter, firework, firm, firmly, fit, fixture, flavour, flaw, flawed, flee, fleet, flesh, flexibility, flourish, fluid, fond, fool, footage, forbid, forecast, foreigner, forge, format, formation, formerly, formula, formulate, forth, forthcoming, fortunate, forum, fossil, foster, foundation, founder, fraction, fragile, fragment, framework, franchise, frankly, fraud, freely, frequent, frustrated, frustrating, frustration, fulfil, full-time, functional, fundamentally, fundraising, funeral, furious, gallon, gambling, gaming, gathering, gay, gaze, gear, gender, gene, generic, genetic, genius, genocide, genuine, genuinely, gesture, gig, glance, glimpse, globalization, globe, glorious, glory, golden, goodness, gorgeous, governance, governor, grace, graphic, graphics, grasp, grave, gravity, greatly, greenhouse, grid, grief, grin, grind, grip, grocery, guerrilla, guidance, guideline, guilt, gut, habitat, hail, halfway, halt, handful, handling, handy, harassment, harbour, hardware, harmony, harsh, harvest, hatred, haunt, hazard, headquarters, heal, healthcare, heighten, helmet, hence, herb, heritage, hidden, hierarchy, high-profile, highway, hilarious, hint, hip, historian, homeland, homeless, honesty, hook, hopeful, hopefully, horizon, horn, hostage, hostile, hostility, humanitarian, humanity, humble, hunger, hydrogen, hypothesis, icon, identical, identification, ideological, ideology, idiot, ignorance, illusion, imagery, immense, immigration, imminent, immune, implement, implementation, implication, imprison, imprisonment, inability, inadequate, inappropriate, incentive, incidence, inclined, inclusion, incorporate, incorrect, incur, independence, index, indication, indicator, indictment, indigenous, induce, indulge, inequality, inevitable, infamous, infant, infect, infer, inflation, inflict, influential, info, infrastructure, inhabitant, inherent, inherit, inhibit, initiate, inject, injection, injustice, ink, inmate, innovation, innovative, input, insert, insertion, insider, inspect, inspection, inspector, inspiration, installation, instant, instantly, instinct, institutional, instruct, instrumental, insufficient, insult, intact, intake, integral, integrate, integrated, integration, integrity, intellectual, intensify, intensity, intensive, intent, interact, interaction, interactive, interface, interfere, interference, interim, interior, intermediate, interpretation, interval, intervene, intervention, intimate, intriguing, invade, invasion, investigator, investor, invisible, invoke, involvement, ironic, ironically, irony, irrelevant, isolate, isolated, isolation, jail, jet, joint, journalism, judicial, junction, jurisdiction, jury, just, justification, kidnap, kidney, kingdom, kit, lad, ladder, landing, landlord, landmark, lane, lap, large-scale, laser, lately, latter, lawn, lawsuit, layout, leaflet, leak, leap, legacy, legend, legendary, legislation, legislative, legislature, legitimate, lengthy, lens, lesbian, lesser, lethal, liable, liberal, liberation, liberty, license, lifelong, lifetime, lighting, likelihood, likewise, limb, limitation, line-up, linear, linger, listing, literacy, literally, literary, litre, litter, liver, lobby, log, logic, logo, long-standing, long-time, loom, loop, lottery, loyal, loyalty, lyric, machinery, magical, magistrate, magnetic, magnificent, magnitude, mainland, mainstream, maintenance, major, make-up, making, mandate, mandatory, manifest, manipulate, manipulation, manufacture, manufacturing, manuscript, marathon, march, margin, marginal, marine, marker, marketplace, martial, mask, massacre, mate, mathematical, mature, maximize, mayor, meaningful, meantime, mechanic, mechanical, mechanism, medal, medication, medieval, meditation, melody, membership, memo, memoir, memorable, memorial, mentor, merchant, mercy, mere, merely, merge, merger, merit, metaphor, methodology, midst, migration, militant, militia, mill, miner, minimal, minimize, mining, ministry, minute, miracle, miserable, misery, misleading, missile, mob, mobility, mobilize, mode, moderate, modest, modification, momentum, monk, monopoly, monster, monthly, monument, morality, moreover, mortgage, mosque, motion, motivate, motivation, motive, motorist, moving, municipal, mutual, myth, naked, namely, nasty, nationwide, naval, navigation, nearby, necessity, neglect, negotiate, negotiation, neighbouring, nest, net, neutral, newly, newsletter, niche, noble, nod, nominate, nomination, nominee, non-profit, nonetheless, nonsense, noon, norm, notable, notably, notebook, notify, notorious, novel, novelist, nowadays, nursery, nursing, nutrition, obesity, objection, oblige, observer, obsess, obsession, obstacle, occasional, occupation, occupy, occurrence, odds, offender, offering, offspring, ongoing, openly, opera, operational, operator, opt, optical, optimism, optimistic, oral, orchestra, organic, organizational, orientation, originate, outbreak, outfit, outing, outlet, outlook, output, outrage, outsider, outstanding, overcome, overlook, overly, overnight, overseas, oversee, overturn, overwhelm, overwhelming, ownership, oxygen, packet, pad, palm, panic, parade, parallel, parameter, parental, parish, parliamentary, part-time, partial, partially, participation, partnership, passing, passionate, passive, password, pastor, patch, patent, pathway, patience, patrol, patron, pause, peak, peasant, peculiar, peer, penalty, perceive, perception, permanently, persist, persistent, personnel, petition, philosopher, philosophical, physician, pill, pioneer, pipeline, pirate, pit, pity, placement, plea, plead, pledge, plug, plunge, pole, poll, pond, pop, portfolio, portion, portray, post-war, postpone, potentially, practitioner, preach, precede, precedent, precious, precise, precisely, precision, predator, predecessor, predictable, predominantly, preference, pregnancy, prejudice, preliminary, premier, premise, premium, prescribe, prescription, presently, preservation, preside, presidency, presidential, prestigious, presumably, presume, prevail, prevalence, prevention, prey, pride, primarily, principal, prior, privatization, privilege, probability, probable, probe, problematic, proceed, proceeding, proceeds, processing, processor, proclaim, productive, productivity, profitable, profound, programming, progressive, prohibit, projection, prominent, promising, promotion, prompt, pronounced, propaganda, proportion, proposition, prosecute, prosecution, prosecutor, prospective, prosperity, protective, protein, protester, protocol, province, provincial, provision, provoke, psychiatric, psychological, publicity, publishing, pulse, pump, punch, punk, purely, pursuit, puzzle, query, quest, questionnaire, quota, racial, racism, racist, radar, radiation, radical, rage, raid, rail, rally, random, ranking, rape, rat, rating, ratio, rational, ray, readily, realization, realm, rear, reasonably, reasoning, reassure, rebel, rebellion, rebuild, receiver, recession, recipient, reckon, recognition, reconstruction, recount, recovery, recruit, recruitment, referee, referendum, reflection, reform, refuge, refugee, refusal, regain, regardless, regime, registration, regulate, regulator, regulatory, rehabilitation, reign, reinforce, rejection, relevance, reliability, relieve, relieved, reluctant, remainder, remains, remarkable, remarkably, remedy, reminder, removal, render, renew, renowned, rental, replacement, reportedly, reporting, representation, reproduce, reproduction, republic, resemble, reside, residence, residential, residue, resign, resignation, resistance, resolution, respective, respectively, restoration, restore, restraint, restrict, restriction, resume, retail, retirement, retreat, retrieve, revelation, revenge, revenue, reverse, revision, revival, revive, revolutionary, rhetoric, ridiculous, rifle, riot, rip, risky, ritual, rival, rob, robbery, robust, rock, rocket, rod, romance, rose, rotate, rotation, roughly, ruin, ruling, rumour, sack, sacred, sacrifice, saint, sake, sanction, satisfaction, say, scandal, scare, scattered, scenario, sceptical, scholar, scholarship, scope, scratch, screening, screw, scrutiny, seal, secular, seeker, seemingly, segment, seize, seldom, selective, seminar, senator, sensation, sensitivity, sentiment, separation, serial, set-up, settlement, settler, severely, sexuality, sexy, shaped, shareholder, shatter, shed, sheer, shipping, shocking, shoot, shore, short-term, shortage, shortly, shrink, shrug, sibling, sigh, signature, significance, simulate, simulation, simultaneously, sin, situated, sketch, skilled, skip, skull, slam, slap, slash, slavery, slogan, slot, smash, snap, so-called, soak, soar, socialist, sole, solely, solicitor, solidarity, solo, somehow, sometime, sophisticated, sound, sovereignty, spam, span, spare, spark, specialize, specialized, specification, specify, specimen, spectacle, spectacular, spectator, spectrum, speculate, speculation, spell, sphere, spill, spin, spine, spite, spoil, spokesman, spokesperson, spokeswoman, sponsorship, sporting, spotlight, spouse, spy, squad, squeeze, stab, stability, stabilize, stake, stall, stance, standing, stark, starve, statistical, steadily, steam, steer, stem, stereotype, stimulate, stimulus, stir, storage, straightforward, strain, strand, strategic, strengthen, strictly, striking, strip, strive, stroke, structural, stumble, stun, stunning, submission, subscriber, subscription, subsequent, subsequently, subsidy, substantial, substantially, substitute, substitution, subtle, suburb, suburban, succession, successive, successor, suck, sue, suffering, sufficient, sufficiently, suicide, suite, summit, super, superb, superior, supervise, supervision, supervisor, supplement, supportive, supposedly, suppress, supreme, surge, surgeon, surgical, surplus, surrender, surveillance, survival, survivor, suspend, suspension, suspicion, suspicious, sustain, sustainable, swallow, swing, sword, symbolic, sympathetic, syndrome, synthesis, systematic, tackle, tactic, tactical, tag, tap, taxpayer, technological, teens, temple, temporarily, tempt, tenant, tendency, tender, tension, tenure, terminal, terminate, terms, terrain, terribly, terrific, terrify, territory, terror, terrorism, terrorist, testify, testimony, testing, textbook, texture, thankfully, theatrical, theft, theology, theoretical, therapist, thereafter, thereby, thesis, thorough, thoroughly, thought-provoking, thoughtful, thread, threshold, thrilled, thrive, thumb, tide, tighten, timber, timely, timing, tissue, tobacco, tolerance, tolerate, toll, ton, tonne, top, torture, toss, total, tournament, toxic, trace, trademark, trading, tragedy, tragic, trail, trailer, trait, transaction, transcript, transformation, transit, transmission, transmit, transparency, transparent, transportation, trap, trauma, treasure, treaty, tremendous, tribal, tribe, tribunal, tribute, trigger, trillion, trio, triumph, troop, trophy, troubled, trustee, tsunami, tuition, turnout, turnover, twist, ultimate, unacceptable, uncertainty, undergo, undergraduate, underlying, undermine, undertake, undoubtedly, unfold, unfortunate, unify, unite, unity, universal, unprecedented, unveil, upcoming, upgrade, uphold, urgent, usage, useless, utility, utilize, utterly, vacuum, vague, valid, validity, vanish, variable, variation, varied, vein, venture, verbal, verdict, verify, verse, versus, vertical, vessel, veteran, viable, vibrant, vice, vicious, viewpoint, villager, violate, violation, virtue, visa, visible, vocal, voluntary, voting, vow, vulnerability, vulnerable, wander, ward, warehouse, warfare, warming, warrant, warrior, weaken, weave, weed, weekly, weird, welfare, well, well-being, whatsoever, wheat, whereby, whilst, whip, whoever, wholly, widen, widespread, widow, width, willingness, wipe, wisdom, wit, withdraw, withdrawal, workforce, workout, workplace, workshop, worm, worship, worthwhile, worthy, wrist, yell, yield, youngster"]
    }
    if (getStorageItem("typingMode") == "time") {
        sentenceLength = 250; //max amount of words (should eventually be changed to update after tyhe begin typing to minimize latency)
    }
    else {
        sentenceLength = getStorageItem("words");
    }
    sentence[0] = wordList[Math.floor(Math.random() * wordList.length)];
    for (let i = 1; i < sentenceLength; i++) {
        let previousWord = sentence[i - 1];
        let filteredWordList = wordList.filter(word => word !== previousWord);
        let randomWord = filteredWordList[Math.floor(Math.random() * filteredWordList.length)];
        sentence[i] = randomWord;
    }


    
}
function wordsPerMinute(testDuration) {
    if (getStorageItem("typingMode") == "time") {
        const timeIn = getStorageItem("time") - testDuration
        const correctText = displayText?.querySelectorAll('.correct').length
        const wpm = Math.round(correctText / 4 / timeIn * 60)
        return wpm
    }
    else {
        const timeIn = testDuration
        const correctText = displayText?.querySelectorAll('.correct').length
        const wpm = Math.round(correctText / 5 / timeIn * 60)
        return wpm
    }
}
async function newQuote() {
    if (getStorageItem("typingMode") == "time")
    {
        displayTimer.innerHTML = getTime(getStorageItem("time")) //sets the time (does not begin timer however)
    }
    else
    {
        displayTimer.innerHTML = getTime(0);
    }
    displayInput.addEventListener('input', () => { startTimer() }) //starts the timer on input
    randomQuote() //creates a new random quote (Values stored inside sentence Array)
    for (let i = 0; i < sentenceLength; i++) {
        const word = document.createElement('div')
        if (i == 0) //first Word
        {
            word.className = "current-word"
        }
        else {
            word.className = "word";
        }
        for (let j = 0; j < sentence[i].length; j++) {
            const letter = document.createElement('letter')
            letter.innerText = (sentence[i].substring(j, j + 1))
            word.appendChild(letter)
            displayText?.appendChild(word)
        }
        words[i] = word //adds each element
    }
    count = displayText?.getElementsByClassName('word').length + displayText?.getElementsByClassName('incorrect-word').length; //not including current word
    lastWord = displayText?.getElementsByClassName('word')[count - 1]//Only want 1 value in class list
}
function startTimer() {
    if (timerStatus == false) {
        footer.classList.add('fadeOut');
        typingMode.classList.add('fadeOut');
        hotkey.classList.add('fadeOut');
        document.getElementById('cursor').style.animation = "none";
        startTime = new Date()
        if (getStorageItem("typingMode") == "words")
        {
            check = setInterval(function () {

                duration = Math.floor(0 + (new Date() - startTime) / 1000) //1 second intervals
                displayTimer.innerText = getTime(duration)
                displayWPM.innerText = wordsPerMinute(duration) + " wpm"
            }, 1000)
        }
        else
        {
            check = setInterval(function () {
                let testTime = parseInt(getStorageItem("time"));
                duration = Math.floor(testTime + 1 - (new Date() - startTime) / 1000) //1 second intervals
                displayTimer.innerText = getTime(duration)
                displayWPM.innerText = wordsPerMinute(duration) + " wpm"
                if (duration <= 0) {
                    endTest()
                }
            }, 1000)
        }
        timerStatus = true;
    }
}
function getTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = time - minutes * 60;
    var finalTime = str_pad_left(minutes, '0', 1) + ':' + str_pad_left(seconds, '0', 2);
    return finalTime
}
function str_pad_left(string, pad, length) {
    return (new Array(length + 1).join(pad) + string).slice(-length);
}
function wrongWord(words, charecters) {
    words[currentWordNum].className = 'incorrect-word';
    for (let i = 0; i < charecters.length; i++) {
        charecters[i].classList.add("incorrect")
    }
}
function endTest() {
    document.getElementById('cursor').style.animation = "none";
    document.getElementById('cursor').style.opacity = "0%";
    wpmFinal = wordsPerMinute(duration)
    const correct = displayText?.querySelectorAll('.correct').length //correct characters
    const incorrect = displayText?.querySelectorAll('.incorrect').length //incorrect characters
    const total = correct + incorrect;
    const accuracy = parseInt(correct / total * 100);
    const correctWords = displayText?.querySelectorAll('.word').length + displayText?.querySelectorAll('.current-word').length //correct words
    const incorrectWords = displayText?.querySelectorAll('.incorrect-word').length //incorrect words

    if (getStorageItem("typingMode") == "time")
    {
        window.location.href = "?finish=true&testTime=" + getStorageItem("time") + "&wpm=" + wpmFinal + "&accuracy=" + accuracy + "&mode=time&correctWords=" + correctWords + "&incorrectWords=" + incorrectWords
    }
    else if (getStorageItem("typingMode") == "words")
    {
        window.location.href = "?finish=true&testTime=" + getStorageItem("words") + "&wpm=" + wpmFinal + "&accuracy=" + accuracy + "&mode=words&correctWords=" + correctWords + "&incorrectWords=" + incorrectWords
    }
    
}
function moveCursor()
{
  if (getStorageItem('caret') == "highlightWord") //
  {
    const cursor = document.getElementById('cursor') 
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    cursor.style.left = rect.x + "px";
    cursor.style.width = rect.width + "px";
    cursor.style.animation = "none";
    cursor.style.opacity = "20%";
  }
  else if (getStorageItem('caret') == "underlineWord") //
  {
    const cursor = document.getElementById('cursor') 
    const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    const rect = placement.getBoundingClientRect();
    cursor.style.left = rect.x + "px";
    cursor.style.width = rect.width + "px";
    cursor.style.marginTop = (localStorage.getItem("fontSize") * 1.25) + "rem";
    cursor.style.height = (localStorage.getItem("fontSize") / 4) + "rem";
    cursor.style.animation = "none";
  }
  else if(getStorageItem('caret') == "caret")
  {
    const cursor = document.getElementById('cursor') 
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    if (index >= chars.length)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x + "px";
    }
  }
  else if(getStorageItem('caret') == "underlineLetter")
  {
    const cursor = document.getElementById('cursor') 
    cursor.style.animation = "none";
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    cursor.style.marginTop = (localStorage.getItem("fontSize") * 1.25) + "rem";
    cursor.style.height = (localStorage.getItem("fontSize") / 4) + "rem";
    if (index > chars.length - 1)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width - 10 + "px";
      cursor.style.width = rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x + "px";
      cursor.style.width = rect.width + "px";
    }

  }
  else
  {
    const cursor = document.getElementById('cursor') 
    cursor.style.animation = "none";
    const parent = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
    let chars = parent.querySelectorAll("*");
    let index = displayInput.value.length
    if (index > chars.length - 1)
    {
      const rect = chars[index - (index - (chars.length - 1))].getBoundingClientRect();
      cursor.style.left = rect.x + rect.width + "px";
    }
    else
    {
      const rect = chars[index].getBoundingClientRect();
      cursor.style.left = rect.x - 10 + "px";
    }
  }
}
function moveCursorWithY() {
  moveCursor();
  const cursor = document.getElementById('cursor') 
  const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
  const rect = placement.getBoundingClientRect();
  cursor.style.top = rect.y + "px";
}
function setBlur() {
    if (getStorageItem("lineCount") > 1 && getStorageItem("blur") == "on") {
        let lines = getCookie("lineCount");
        let height = window.getComputedStyle(document.getElementById('testText')).getPropertyValue("height").replace("px", "") //remove px
        let boxHeight = (height / lines * (lines - 1))
        console.log(boxHeight)
        const blurBox = document.createElement('div')
        blurBox.style.height = boxHeight + "px"
        blurBox.style.width = window.getComputedStyle(document.getElementById('testText')).getPropertyValue("width")
        blurBox.classList.add("box")
        const placement = document.getElementsByClassName('current-word')[0]; //Only want 1 value in class list
        const rect = placement.getBoundingClientRect();
        blurBox.style.top = rect.y + "px";
        mainContent.appendChild(blurBox)
    }
}
function setCursorVisibility() {
    document.getElementById('cursor').style.visibility = 'visible';
}

function setCursorInvisibility() {
    document.getElementById('cursor').style.visibility = 'hidden';
}
function zoomwait() {
    try {
        document.getElementsByClassName('box')[0].remove(); //if has blur box
        setTimeout(() => { moveCursorWithY(), setBlur(), setCursorVisibility(); }, 650);
    } catch (err) {
        setTimeout(() => { moveCursorWithY(), setCursorVisibility(); }, 650);
    }
}
function findItem(name, parentId) {
    const children = document.getElementById(parentId).children // wpm Display
    for (var i = 0; i < children.length; i++) {
        var child = children[i];
        if (getStorageItem(name) == child.innerHTML){
            return child;
        }
    }
}
function updateModes()
{
    //remove current chosen classes
    const modes = ['timesContainer', 'wordsContainer', 'modesContainer']
    for (var i = 0; i < modes.length; i++) {
        const mode = document.getElementById(modes[i]).children // wpm Display
        for (var j = 0; j < mode.length; j++) {
            var child = mode[j];
            try {
                child.classList.remove("currentMode");
            } catch (e) {
            }
        }
    }
    if (getStorageItem("typingMode") == "time") //set the current time
    {
        findItem('time', 'timesContainer').classList.add("currentMode");
    }
    else if (getStorageItem("typingMode") == "words") //set the current num words
    {
        findItem('words', 'wordsContainer').classList.add("currentMode");
    }
    findItem('mode', 'modesContainer').classList.add("currentMode"); //update regardless
}
function refresh() {
    if(window.location.href.indexOf("login") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("signup") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("profile") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else if(window.location.href.indexOf("index") > -1) {
        hotkey.style.visibility = "hidden";
    }
    else
    {
        newQuote();
        setBlur();
        updateModes();
        moveCursorWithY();
    }
}
function setTheme(oldTheme, newTheme) {
    const body = document.getElementsByTagName("body")[0];
    body.classList.add(newTheme);
    setTimeout(() => body.classList.remove(oldTheme), 0); // ensuring new styles are applied before removing the old theme
    currentTheme = newTheme;
    localStorage.setItem("theme", newTheme);
}
function setPreference(type, newPreference)
    {
        const root = document.querySelector(':root');
        root.style.setProperty("--" + type, newPreference);
        localStorage.setItem(type, newPreference);
}
function addNotification(header, description)
{
    var parent = document.getElementById('notifications');
    var element = document.createElement("div");
    element.classList.add('notification');
    var h = document.createElement("div");
    var d = document.createElement("div");
    h.classList.add('notificationH');
    d.classList.add('notificationD');
    h.appendChild(document.createTextNode(header));
    d.appendChild(document.createTextNode(description));

    while (parent.firstChild) {
        parent.removeChild(parent.lastChild);
      }
    element.appendChild(h);
    element.appendChild(d);

    parent.appendChild(element);

    var parent = document.getElementById('notifications');
    var notification = document.createElement("div");
}
function getStorageItem(name) {
    return localStorage.getItem(name);
}
function loadPreferences() {
    //for each preference
    //1. Try to read from local storage, otherwise set to default
    //2. set preference to local storage
    let theme = localStorage.getItem("theme") || "light";
    setTheme("default", theme); 
    let fontSize = localStorage.getItem("fontSize") || "3";
    let fontFamily = localStorage.getItem("fontFamily") || "LexendDeca";
    let lineCount = localStorage.getItem("lineCount") || "2";
    let caret = localStorage.getItem("caret") || "caret";
    let typingMode = localStorage.getItem("typingMode") || "time";
    let words = localStorage.getItem("words") || 10;
    let time = localStorage.getItem("time") || 15;
    let blur = localStorage.getItem("blur") || "off";
    let mode = localStorage.getItem("mode") || "easy";
    let title = localStorage.getItem("selectedTitle") || "harryPotter";

    setPreference("fontSize", fontSize); 
    setPreference("fontFamily", fontFamily); 
    setPreference("lineCount", lineCount); 
    setPreference("caret", caret); 
    setPreference("typingMode", typingMode); 
    setPreference("words", words);
    setPreference("time", time);
    setPreference("blur", blur);
    setPreference("mode", mode);
    setPreference("selectedTitle", title);
    
}
loadPreferences();
document.body.onLoad = refresh();
document.body.onresize = function() { zoomwait() };