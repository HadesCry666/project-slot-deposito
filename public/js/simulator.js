const rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 });

function parseMoney(value) {
  return Number(String(value).replace(/\D/g, '')) || 0;
}

function formatInput() {
  const moneyInput = document.getElementById('money-input');
  if (!moneyInput) return;
  const number = parseMoney(moneyInput.value);
  moneyInput.value = number ? new Intl.NumberFormat('id-ID').format(number) : '';
}

// Smooth Number Counter Animation
function animateValue(element, start, end, duration = 650, prefix = '', isCurrency = true) {
  if (!element) return;
  const startTime = performance.now();
  const diff = end - start;

  function update(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    // Ease out cubic
    const easeProgress = 1 - Math.pow(1 - progress, 3);
    const current = Math.round(start + diff * easeProgress);

    if (isCurrency) {
      const formatted = rupiah.format(Math.abs(current));
      element.textContent = `${prefix}${current < 0 ? '−' : (prefix === '+' && current > 0 ? '+' : '')}${formatted}`;
    } else {
      element.textContent = `${prefix}${current}`;
    }

    if (progress < 1) {
      requestAnimationFrame(update);
    }
  }

  requestAnimationFrame(update);
}

function makeSmoothBezierPath(values) {
  const width = 420, left = 10, baseY = 120, topY = 28;
  const min = Math.min(...values), max = Math.max(...values);
  const points = values.map((value, index) => {
    const x = left + (width / (values.length - 1)) * index;
    const normal = max === min ? 0.5 : (value - min) / (max - min);
    const y = baseY - normal * (baseY - topY);
    return { x: Number(x.toFixed(1)), y: Number(y.toFixed(1)) };
  });

  if (points.length === 0) return { path: '', points: [] };
  let path = `M ${points[0].x} ${points[0].y}`;

  for (let i = 0; i < points.length - 1; i++) {
    const p0 = points[i];
    const p1 = points[i + 1];
    const dx = p1.x - p0.x;
    const cp1x = (p0.x + dx * 0.42).toFixed(1);
    const cp1y = p0.y.toFixed(1);
    const cp2x = (p1.x - dx * 0.42).toFixed(1);
    const cp2y = p1.y.toFixed(1);
    path += ` C ${cp1x} ${cp1y}, ${cp2x} ${cp2y}, ${p1.x} ${p1.y}`;
  }

  return { path, points };
}

function updateCharts(amount, months, monthlyRate, slotBalance) {
  const depositValues = Array.from({length: 6}, (_, i) => amount * Math.pow(1 + monthlyRate, (months / 5) * i));
  
  const slotValues = Array.from({length: 6}, (_, i) => {
    const target = slotBalance;
    const wobble = i === 0 || i === 5 ? 0 : (Math.random() - 0.45) * amount * 0.08;
    return Math.max(0, amount + (target - amount) * (i / 5) + wobble);
  });
  slotValues[0] = amount;
  slotValues[5] = slotBalance;

  const depResult = makeSmoothBezierPath(depositValues);
  const slotResult = makeSmoothBezierPath(slotValues);

  const depLine = document.getElementById('dep-line');
  const depArea = document.getElementById('dep-area');
  const slotLine = document.getElementById('slot-line');
  const slotArea = document.getElementById('slot-area');

  if (depLine) depLine.setAttribute('d', depResult.path);
  if (depArea) depArea.setAttribute('d', `${depResult.path} L 430 140 L 10 140 Z`);
  if (slotLine) slotLine.setAttribute('d', slotResult.path);
  if (slotArea) slotArea.setAttribute('d', `${slotResult.path} L 430 140 L 10 140 Z`);

  // Update glowing data point dots
  if (depResult.points.length > 0) {
    const lastDep = depResult.points[depResult.points.length - 1];
    const depPoint = document.getElementById('dep-point-end');
    if (depPoint) {
      depPoint.setAttribute('cx', lastDep.x);
      depPoint.setAttribute('cy', lastDep.y);
    }
  }

  if (slotResult.points.length > 0) {
    const lastSlot = slotResult.points[slotResult.points.length - 1];
    const slotPoint = document.getElementById('slot-point-end');
    if (slotPoint) {
      slotPoint.setAttribute('cx', lastSlot.x);
      slotPoint.setAttribute('cy', lastSlot.y);
    }
  }
}

// Render 6 Spin Cards for Slot with Staggered JS Reveal Animation
function renderSlotPattern(amount, finalBalance, rounds) {
  const pattern = document.getElementById('slot-pattern');
  if (!pattern) return;
  pattern.innerHTML = '';
  let balance = amount;
  const winChance = 0.25;
  for (let i = 1; i <= rounds; i += 1) {
    const isWin = i === rounds ? finalBalance >= balance : Math.random() < winChance;
    const remainingRounds = rounds - i;
    const targetDelta = finalBalance - balance;
    const step = remainingRounds === 0 ? targetDelta : targetDelta / (remainingRounds + 1);
    const swing = Math.max(amount * 0.035, Math.abs(targetDelta) * 0.18);
    const change = isWin ? Math.max(amount * 0.01, Math.abs(step) + swing) : -Math.max(amount * 0.02, Math.abs(step) + swing);
    const nextBalance = i === rounds ? finalBalance : Math.max(0, Math.round(balance + change));
    const delta = nextBalance - balance;
    
    const card = document.createElement('div');
    card.className = `spin-card-anim rounded-xl border p-2 transition-all duration-300 hover:scale-105 overflow-hidden ${delta >= 0 ? 'border-emerald-500/40 bg-emerald-950/60 shadow-lg shadow-emerald-950/50' : 'border-rose-500/40 bg-rose-950/60 shadow-lg shadow-rose-950/50'}`;
    card.style.animationDelay = `${i * 0.07}s`;

    card.innerHTML = `
      <div class="flex items-center justify-between gap-1 text-[9px] font-bold text-slate-300 mb-1 min-w-0">
        <span class="shrink-0">Spin ${i}</span>
        <span class="px-1 py-0.5 rounded text-[8px] font-extrabold shrink-0 ${delta >= 0 ? 'bg-emerald-500/25 text-emerald-300' : 'bg-rose-500/25 text-rose-300'}">${delta >= 0 ? '✓' : '✗'}</span>
      </div>
      <p class="text-[10px] font-bold leading-tight truncate ${delta >= 0 ? 'text-emerald-400' : 'text-rose-400'}">${delta >= 0 ? '+' : '−'}${rupiah.format(Math.abs(delta))}</p>
      <p class="mt-0.5 text-[9px] text-slate-400 font-medium truncate">Saldo: ${rupiah.format(nextBalance)}</p>
    `;
    pattern.appendChild(card);
    balance = nextBalance;
  }
}

// Render 6-Month Compounding Breakdown Cards for Deposito to Balance Right Panel Height
function renderDepositBreakdown(amount, months, monthlyRate, rounds = 6) {
  const breakdown = document.getElementById('deposit-breakdown');
  if (!breakdown) return;
  breakdown.innerHTML = '';
  
  for (let i = 1; i <= rounds; i += 1) {
    const currentMonths = (months / rounds) * i;
    const currentBalance = Math.round(amount * Math.pow(1 + monthlyRate, currentMonths));
    const accumulatedInterest = currentBalance - amount;

    const card = document.createElement('div');
    card.className = `spin-card-anim rounded-xl border border-emerald-500/30 bg-emerald-950/60 p-2 transition-all duration-300 hover:scale-105 shadow-lg shadow-emerald-950/40 overflow-hidden`;
    card.style.animationDelay = `${i * 0.07}s`;

    card.innerHTML = `
      <div class="flex items-center justify-between gap-1 text-[9px] font-bold text-slate-300 mb-1 min-w-0">
        <span class="shrink-0">P${i}</span>
        <span class="px-1 py-0.5 rounded text-[8px] font-extrabold bg-emerald-500/25 text-emerald-300 shrink-0">✓</span>
      </div>
      <p class="text-[10px] font-bold leading-tight text-emerald-400 truncate">+${rupiah.format(accumulatedInterest)}</p>
      <p class="mt-0.5 text-[9px] text-slate-400 font-medium truncate">Saldo: ${rupiah.format(currentBalance)}</p>
    `;
    breakdown.appendChild(card);
  }
}

function simulate() {
  const moneyInput = document.getElementById('money-input');
  const periodSelect = document.getElementById('period-select');
  const rateInput = document.getElementById('rate-input');
  const feedback = document.getElementById('input-feedback');

  if (!moneyInput || !periodSelect || !rateInput) return;

  const amount = parseMoney(moneyInput.value);
  const months = Number(periodSelect.value);
  const annualRate = Number(rateInput.value);

  if (amount < 1000) {
    if (feedback) feedback.textContent = 'Masukkan nominal minimal Rp1.000 untuk menjalankan simulasi.';
    moneyInput.focus();
    return;
  }
  if (feedback) feedback.textContent = 'Hasil simulasi dihitung secara obyektif berdasarkan prinsip matematika finansial.';

  const monthlyRate = annualRate / 100 / 12;
  const finalDeposit = amount * Math.pow(1 + monthlyRate, months);
  const interest = finalDeposit - amount;

  // Risk factor model for gambling loss
  const riskFactor = 0.08 + Math.random() * 0.42;
  const slotBalance = Math.round(amount * riskFactor);
  const slotChange = slotBalance - amount;
  const risk = Math.min(99, Math.round(78 + (months / 60) * 16 + Math.random() * 5));
  const difference = finalDeposit - slotBalance;
  const growthPercent = ((finalDeposit / amount) - 1) * 100;

  const slotInitial = document.getElementById('slot-initial');
  const slotBalanceEl = document.getElementById('slot-balance');
  const slotChangeEl = document.getElementById('slot-change');
  const depInitial = document.getElementById('dep-initial');
  const depInterest = document.getElementById('dep-interest');
  const depFinal = document.getElementById('dep-final');
  const diffOutput = document.getElementById('difference-output');
  const riskFill = document.getElementById('risk-fill');
  const riskLevel = document.getElementById('risk-level');
  const depositFill = document.getElementById('deposit-fill');
  const monthlyValue = document.getElementById('monthly-value');
  const projectionValue = document.getElementById('projection-value');

  // Animated counting numbers
  if (slotInitial) animateValue(slotInitial, 0, amount, 650, '', true);
  if (slotBalanceEl) animateValue(slotBalanceEl, amount, slotBalance, 650, '', true);
  if (slotChangeEl) animateValue(slotChangeEl, 0, slotChange, 650, slotChange < 0 ? '−' : '+', true);
  
  if (depInitial) animateValue(depInitial, 0, amount, 650, '', true);
  if (depInterest) animateValue(depInterest, 0, interest, 650, '+', true);
  if (depFinal) animateValue(depFinal, amount, finalDeposit, 650, '', true);
  
  if (diffOutput) animateValue(diffOutput, 0, difference, 700, '+', true);

  if (riskFill) riskFill.style.width = `${risk}%`;
  if (riskLevel) riskLevel.textContent = risk > 88 ? 'Sangat Tinggi (Rungkat)' : 'Tinggi';
  if (depositFill) depositFill.style.width = `${Math.min(100, 18 + growthPercent * 4)}%`;
  if (monthlyValue) monthlyValue.textContent = `+${rupiah.format(interest / months)} / bulan*`;
  if (projectionValue) projectionValue.textContent = `Proyeksi ${months} bulan: ${rupiah.format(finalDeposit)} pada bunga ${annualRate.toFixed(1).replace('.', ',')}% per tahun.`;

  updateCharts(amount, months, monthlyRate, slotBalance);
  renderSlotPattern(amount, slotBalance, 6);
  renderDepositBreakdown(amount, months, monthlyRate, 6);

  const slotPanel = document.getElementById('slot-panel');
  const depositPanel = document.getElementById('deposit-panel');
  if (slotPanel) slotPanel.classList.remove('result-pulse');
  if (depositPanel) depositPanel.classList.remove('result-pulse');

  requestAnimationFrame(() => {
    if (slotPanel) slotPanel.classList.add('result-pulse');
    if (depositPanel) depositPanel.classList.add('result-pulse');
  });
}

window.addEventListener('DOMContentLoaded', () => {
  if (typeof lucide !== 'undefined' && lucide.createIcons) {
    lucide.createIcons();
  }

  const form = document.getElementById('simulator-form');
  if (form) {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      formatInput();
      simulate();
    });
  }

  const moneyInput = document.getElementById('money-input');
  if (moneyInput) {
    moneyInput.addEventListener('blur', formatInput);
  }

  const rateInput = document.getElementById('rate-input');
  const rateValue = document.getElementById('rate-value');
  if (rateInput) {
    const updateSliderTrack = () => {
      const min = Number(rateInput.min) || 1;
      const max = Number(rateInput.max) || 10;
      const val = Number(rateInput.value);
      const percentage = ((val - min) / (max - min)) * 100;
      rateInput.style.background = `linear-gradient(to right, #10b981 0%, #10b981 ${percentage}%, #334155 ${percentage}%, #334155 100%)`;
      if (rateValue) {
        rateValue.textContent = `${val.toFixed(1).replace('.', ',')}% / tahun`;
      }
    };
    rateInput.addEventListener('input', () => {
      updateSliderTrack();
      simulate();
    });
    updateSliderTrack();
  }

  document.querySelectorAll('a[href="#simulator"]').forEach(link => {
    link.addEventListener('click', () => {
      setTimeout(() => {
        const input = document.getElementById('money-input');
        if (input) input.focus();
      }, 500);
    });
  });

  formatInput();
  simulate();
});
