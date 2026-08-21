const rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 });

function parseMoney(value) {
  // Strip anything that's not a digit
  return parseInt(String(value).replace(/[^\d]/g, ''), 10) || 0;
}

function formatInput() {
  const moneyInput = document.getElementById('money-input');
  if (!moneyInput) return;
  const number = parseMoney(moneyInput.value);
  moneyInput.value = number ? new Intl.NumberFormat('id-ID').format(number) : '';
}

// Smooth Number Counter Animation
function animateValue(element, start, end, duration, prefix, isCurrency) {
  if (!element) return;
  duration = duration || 650;
  prefix = prefix || '';
  isCurrency = isCurrency !== false;

  const startTime = performance.now();
  const diff = end - start;

  function update(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const ease = 1 - Math.pow(1 - progress, 3);
    const current = Math.round(start + diff * ease);

    if (isCurrency) {
      const formatted = rupiah.format(Math.abs(current));
      if (prefix === '−' || (prefix === '' && current < 0)) {
        element.textContent = '−' + formatted;
      } else if (prefix === '+') {
        element.textContent = '+' + formatted;
      } else {
        element.textContent = formatted;
      }
    } else {
      element.textContent = prefix + current;
    }

    if (progress < 1) requestAnimationFrame(update);
  }

  requestAnimationFrame(update);
}

// Native HTML5 Canvas Chart Engine
function drawCanvas(canvasId, labels, dataValues, lineColor, fillColorStart) {
  var canvas = document.getElementById(canvasId);
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;

  var parent = canvas.parentElement;
  if (!parent) return;

  // Use offsetWidth/offsetHeight — they work even before getBoundingClientRect is ready
  var w = parent.offsetWidth || 380;
  var h = parent.offsetHeight || 208;

  var dpr = window.devicePixelRatio || 1;
  canvas.width = Math.round(w * dpr);
  canvas.height = Math.round(h * dpr);
  canvas.style.width = w + 'px';
  canvas.style.height = h + 'px';
  ctx.scale(dpr, dpr);
  ctx.clearRect(0, 0, w, h);

  var padL = 52, padR = 12, padT = 18, padB = 24;
  var gW = w - padL - padR;
  var gH = h - padT - padB;

  var maxVal = Math.max.apply(null, dataValues.concat([1000]));

  // Grid lines & Y labels
  ctx.strokeStyle = 'rgba(255,255,255,0.07)';
  ctx.lineWidth = 1;
  ctx.setLineDash([3, 4]);
  ctx.fillStyle = '#94a3b8';
  ctx.font = '600 9px "DM Sans", system-ui, sans-serif';
  ctx.textAlign = 'right';
  ctx.textBaseline = 'middle';

  for (var i = 0; i <= 4; i++) {
    var yVal = maxVal - (maxVal / 4) * i;
    var yPos = padT + (gH / 4) * i;
    ctx.beginPath();
    ctx.moveTo(padL, yPos);
    ctx.lineTo(w - padR, yPos);
    ctx.stroke();
    var label = yVal >= 1000000 ? 'Rp' + (yVal / 1000000).toFixed(1) + 'M'
              : yVal >= 1000 ? 'Rp' + Math.round(yVal / 1000) + 'k'
              : 'Rp' + Math.round(yVal);
    ctx.fillText(label, padL - 5, yPos);
  }
  ctx.setLineDash([]);

  // Points
  var pts = dataValues.map(function(val, idx) {
    var x = padL + (gW / (dataValues.length - 1)) * idx;
    var norm = maxVal > 0 ? val / maxVal : 0;
    var y = padT + gH * (1 - norm);
    return { x: x, y: y, val: val, label: labels[idx] };
  });

  // X labels
  ctx.textAlign = 'center';
  ctx.textBaseline = 'top';
  ctx.fillStyle = '#94a3b8';
  pts.forEach(function(pt) {
    ctx.fillText(pt.label, pt.x, h - padB + 5);
  });

  if (pts.length < 2) return;

  // Fill area
  ctx.beginPath();
  ctx.moveTo(pts[0].x, pts[0].y);
  for (var j = 0; j < pts.length - 1; j++) {
    var cx = (pts[j].x + pts[j + 1].x) / 2;
    ctx.bezierCurveTo(cx, pts[j].y, cx, pts[j + 1].y, pts[j + 1].x, pts[j + 1].y);
  }
  ctx.lineTo(pts[pts.length - 1].x, h - padB);
  ctx.lineTo(pts[0].x, h - padB);
  ctx.closePath();
  var grad = ctx.createLinearGradient(0, padT, 0, h - padB);
  grad.addColorStop(0, fillColorStart);
  grad.addColorStop(1, 'rgba(15,23,42,0)');
  ctx.fillStyle = grad;
  ctx.fill();

  // Main line
  ctx.beginPath();
  ctx.moveTo(pts[0].x, pts[0].y);
  for (var k = 0; k < pts.length - 1; k++) {
    var cx2 = (pts[k].x + pts[k + 1].x) / 2;
    ctx.bezierCurveTo(cx2, pts[k].y, cx2, pts[k + 1].y, pts[k + 1].x, pts[k + 1].y);
  }
  ctx.strokeStyle = lineColor;
  ctx.lineWidth = 3;
  ctx.shadowColor = lineColor;
  ctx.shadowBlur = 8;
  ctx.stroke();
  ctx.shadowBlur = 0;

  // Dots
  pts.forEach(function(pt, idx) {
    ctx.beginPath();
    ctx.arc(pt.x, pt.y, idx === pts.length - 1 ? 5 : 3.5, 0, Math.PI * 2);
    ctx.fillStyle = lineColor;
    ctx.fill();
    ctx.strokeStyle = '#fff';
    ctx.lineWidth = 2;
    ctx.stroke();
  });
}

// Render 6 Spin Cards
function renderSlotPattern(amount, finalBalance) {
  var pattern = document.getElementById('slot-pattern');
  if (!pattern) return;
  pattern.innerHTML = '';
  var balance = amount;

  for (var i = 1; i <= 6; i++) {
    var isLast = (i === 6);
    var isWin = isLast ? (finalBalance >= balance) : (Math.random() < 0.25);
    var targetDelta = finalBalance - balance;
    var remainingRounds = 6 - i;
    var step = remainingRounds === 0 ? targetDelta : targetDelta / (remainingRounds + 1);
    var swing = Math.max(amount * 0.035, Math.abs(targetDelta) * 0.18);
    var change = isWin
      ? Math.max(amount * 0.01, Math.abs(step) + swing)
      : -Math.max(amount * 0.02, Math.abs(step) + swing);
    var nextBalance = isLast ? finalBalance : Math.max(0, Math.round(balance + change));
    var delta = nextBalance - balance;

    var card = document.createElement('div');
    var isPositive = delta >= 0;
    card.className = 'spin-card-anim rounded-xl border p-2.5 overflow-hidden ' +
      (isPositive
        ? 'border-emerald-500/40 bg-emerald-950/80 shadow-lg shadow-emerald-950/50'
        : 'border-rose-500/40 bg-rose-950/80 shadow-lg shadow-rose-950/50');
    card.style.animationDelay = (i * 0.07) + 's';
    card.innerHTML =
      '<div class="flex items-center justify-between gap-1 text-[10px] font-bold text-slate-300 mb-1 min-w-0">' +
        '<span class="shrink-0">Spin ' + i + '</span>' +
        '<span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold shrink-0 ' +
          (isPositive ? 'bg-emerald-500/30 text-emerald-300' : 'bg-rose-500/30 text-rose-300') + '">' +
          (isPositive ? 'MENANG' : 'KALAH') +
        '</span>' +
      '</div>' +
      '<p class="text-xs font-bold leading-tight truncate ' + (isPositive ? 'text-emerald-400' : 'text-rose-400') + '">' +
        (isPositive ? '+' : '−') + rupiah.format(Math.abs(delta)) +
      '</p>' +
      '<p class="mt-1 text-[10px] text-slate-400 font-medium truncate">Saldo: ' + rupiah.format(nextBalance) + '</p>';

    pattern.appendChild(card);
    balance = nextBalance;
  }
}

// Render 6 Deposit Breakdown Cards
function renderDepositBreakdown(amount, months, monthlyRate) {
  var breakdown = document.getElementById('deposit-breakdown');
  if (!breakdown) return;
  breakdown.innerHTML = '';

  for (var i = 1; i <= 6; i++) {
    var currentMonths = (months / 6) * i;
    var currentBalance = Math.round(amount * Math.pow(1 + monthlyRate, currentMonths));
    var accInterest = currentBalance - amount;

    var card = document.createElement('div');
    card.className = 'spin-card-anim rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5 overflow-hidden shadow-lg shadow-emerald-950/50';
    card.style.animationDelay = (i * 0.07) + 's';
    card.innerHTML =
      '<div class="flex items-center justify-between gap-1 text-[10px] font-bold text-slate-300 mb-1 min-w-0">' +
        '<span class="shrink-0">Periode ' + i + '</span>' +
        '<span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-emerald-500/30 text-emerald-300 shrink-0">STABIL</span>' +
      '</div>' +
      '<p class="text-xs font-bold leading-tight text-emerald-400 truncate">+' + rupiah.format(accInterest) + '</p>' +
      '<p class="mt-1 text-[10px] text-slate-400 font-medium truncate">Saldo: ' + rupiah.format(currentBalance) + '</p>';
    breakdown.appendChild(card);
  }
}

function simulate() {
  var moneyInput = document.getElementById('money-input');
  var periodSelect = document.getElementById('period-select');
  var rateInput = document.getElementById('rate-input');
  var feedback = document.getElementById('input-feedback');

  if (!moneyInput || !periodSelect || !rateInput) return;

  var amount = parseMoney(moneyInput.value);
  var months = Number(periodSelect.value) || 12;
  var annualRate = Number(rateInput.value) || 5;

  if (amount < 1000) {
    if (feedback) feedback.textContent = 'Masukkan nominal minimal Rp1.000.';
    return;
  }
  if (feedback) feedback.textContent = 'Simulasi dihitung berdasarkan prinsip matematika finansial.';

  var monthlyRate = annualRate / 100 / 12;
  var finalDeposit = amount * Math.pow(1 + monthlyRate, months);
  var interest = finalDeposit - amount;

  var riskFactor = 0.08 + Math.random() * 0.42;
  var slotBalance = Math.round(amount * riskFactor);
  var slotChange = slotBalance - amount;
  var risk = Math.min(99, Math.round(78 + (months / 60) * 16 + Math.random() * 5));
  var difference = finalDeposit - slotBalance;
  var growthPct = (finalDeposit / amount - 1) * 100;

  // Update stat elements
  animateValue(document.getElementById('slot-initial'), 0, amount, 650, '', true);
  animateValue(document.getElementById('slot-balance'), amount, slotBalance, 650, '', true);
  animateValue(document.getElementById('slot-change'), 0, slotChange, 650, slotChange < 0 ? '−' : '+', true);

  animateValue(document.getElementById('dep-initial'), 0, amount, 650, '', true);
  animateValue(document.getElementById('dep-interest'), 0, interest, 650, '+', true);
  animateValue(document.getElementById('dep-final'), amount, finalDeposit, 650, '', true);

  animateValue(document.getElementById('difference-output'), 0, difference, 700, '+', true);

  var riskFill = document.getElementById('risk-fill');
  var riskLevel = document.getElementById('risk-level');
  var depositFill = document.getElementById('deposit-fill');
  var monthlyValue = document.getElementById('monthly-value');
  var projectionValue = document.getElementById('projection-value');

  if (riskFill) riskFill.style.width = risk + '%';
  if (riskLevel) riskLevel.textContent = risk > 88 ? 'Sangat Tinggi (Rungkat)' : 'Tinggi';
  if (depositFill) depositFill.style.width = Math.min(100, 18 + growthPct * 4) + '%';
  if (monthlyValue) monthlyValue.textContent = '+' + rupiah.format(interest / months) + ' / bulan*';
  if (projectionValue) projectionValue.textContent = 'Proyeksi ' + months + ' bulan: ' + rupiah.format(finalDeposit) + ' pada bunga ' + annualRate.toFixed(1).replace('.', ',') + '% per tahun.';

  // Render cards
  renderSlotPattern(amount, slotBalance);
  renderDepositBreakdown(amount, months, monthlyRate);

  // Chart labels & data
  var labels = [];
  for (var i = 0; i < 6; i++) {
    var m = Math.round((months / 5) * i);
    labels.push(m === 0 ? 'Awal' : 'Bln ' + m);
  }

  var depositValues = [];
  for (var i = 0; i < 6; i++) {
    depositValues.push(Math.round(amount * Math.pow(1 + monthlyRate, (months / 5) * i)));
  }

  var slotValues = [amount];
  for (var i = 1; i < 5; i++) {
    var drop = amount - (amount - slotBalance) * (i / 5);
    var fluct = (Math.random() - 0.5) * amount * 0.08;
    slotValues.push(Math.max(0, Math.round(drop + fluct)));
  }
  slotValues.push(slotBalance);

  // Draw charts
  drawCanvas('slotChart', labels, slotValues, '#ef4444', 'rgba(239,68,68,0.45)');
  drawCanvas('depositoChart', labels, depositValues, '#10b981', 'rgba(16,185,129,0.45)');
}

function initApp() {
  // Format the initial input value
  formatInput();

  // Run first simulation
  simulate();

  // Re-run after layout settles (needed for canvas dimensions in deployed environments)
  setTimeout(function() { simulate(); }, 200);
  setTimeout(function() { simulate(); }, 600);
}

document.addEventListener('DOMContentLoaded', function() {
  // Lucide icons
  if (typeof lucide !== 'undefined' && lucide.createIcons) {
    lucide.createIcons();
  }

  // Form submit
  var form = document.getElementById('simulator-form');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      formatInput();
      simulate();
    });
  }

  // Money input format on blur
  var moneyInput = document.getElementById('money-input');
  if (moneyInput) {
    moneyInput.addEventListener('blur', formatInput);
  }

  // Rate slider
  var rateInput = document.getElementById('rate-input');
  var rateValue = document.getElementById('rate-value');
  if (rateInput) {
    function updateSlider() {
      var min = Number(rateInput.min) || 1;
      var max = Number(rateInput.max) || 10;
      var val = Number(rateInput.value);
      var pct = ((val - min) / (max - min)) * 100;
      rateInput.style.background = 'linear-gradient(to right, #10b981 0%, #10b981 ' + pct + '%, #334155 ' + pct + '%, #334155 100%)';
      if (rateValue) rateValue.textContent = val.toFixed(1).replace('.', ',') + '% / tahun';
    }
    rateInput.addEventListener('input', function() {
      updateSlider();
      simulate();
    });
    updateSlider();
  }

  // Period select live update
  var periodSelect = document.getElementById('period-select');
  if (periodSelect) {
    periodSelect.addEventListener('change', function() {
      simulate();
    });
  }

  // Resize redraw
  var resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(simulate, 150);
  });

  // Anchor click focus
  document.querySelectorAll('a[href="#simulator"]').forEach(function(link) {
    link.addEventListener('click', function() {
      setTimeout(function() {
        var input = document.getElementById('money-input');
        if (input) input.focus();
      }, 500);
    });
  });

  initApp();
});

// Also trigger on full window load (fonts, images, CSS fully applied)
window.addEventListener('load', function() {
  initApp();
});
