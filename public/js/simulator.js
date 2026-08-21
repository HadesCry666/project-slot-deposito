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

// Standalone Native HTML5 Canvas Engine (Zero External Library Dependencies)
function drawNativeCanvasChart(canvasId, labels, dataValues, primaryColor, areaGradientColor) {
  const canvas = document.getElementById(canvasId);
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  if (!ctx) return;

  const rect = canvas.parentElement.getBoundingClientRect();
  const dpr = window.devicePixelRatio || 1;
  canvas.width = rect.width * dpr;
  canvas.height = rect.height * dpr;
  ctx.scale(dpr, dpr);

  const w = rect.width;
  const h = rect.height;

  ctx.clearRect(0, 0, w, h);

  const padLeft = 55;
  const padRight = 20;
  const padTop = 25;
  const padBottom = 30;

  const graphW = w - padLeft - padRight;
  const graphH = h - padTop - padBottom;

  const maxVal = Math.max(...dataValues, 1000);
  const minVal = 0;

  // Gridlines & Y-Axis Labels
  ctx.strokeStyle = 'rgba(255, 255, 255, 0.08)';
  ctx.lineWidth = 1;
  ctx.setLineDash([4, 4]);

  ctx.fillStyle = '#94a3b8';
  ctx.font = '600 10px "DM Sans", sans-serif';
  ctx.textAlign = 'right';
  ctx.textBaseline = 'middle';

  const steps = 4;
  for (let i = 0; i <= steps; i++) {
    const yVal = maxVal - (maxVal / steps) * i;
    const yPos = padTop + (graphH / steps) * i;

    ctx.beginPath();
    ctx.moveTo(padLeft, yPos);
    ctx.lineTo(w - padRight, yPos);
    ctx.stroke();

    const formattedLabel = 'Rp' + (yVal >= 1000000 ? (yVal / 1000000).toFixed(1) + 'M' : (yVal / 1000).toFixed(0) + 'k');
    ctx.fillText(formattedLabel, padLeft - 8, yPos);
  }
  ctx.setLineDash([]);

  // Calculate Point Positions
  const points = dataValues.map((val, idx) => {
    const x = padLeft + (graphW / (dataValues.length - 1)) * idx;
    const norm = (val - minVal) / (maxVal - minVal);
    const y = padTop + graphH * (1 - norm);
    return { x, y, val, label: labels[idx] };
  });

  // X-Axis Labels
  ctx.textAlign = 'center';
  ctx.textBaseline = 'top';
  points.forEach(pt => {
    ctx.fillText(pt.label, pt.x, h - padBottom + 8);
  });

  // Draw Smooth Gradient Area Under Curve
  if (points.length > 0) {
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].y);

    for (let i = 0; i < points.length - 1; i++) {
      const p0 = points[i];
      const p1 = points[i + 1];
      const cx = (p0.x + p1.x) / 2;
      ctx.bezierCurveTo(cx, p0.y, cx, p1.y, p1.x, p1.y);
    }

    ctx.lineTo(points[points.length - 1].x, h - padBottom);
    ctx.lineTo(points[0].x, h - padBottom);
    ctx.closePath();

    const areaGradient = ctx.createLinearGradient(0, padTop, 0, h - padBottom);
    areaGradient.addColorStop(0, areaGradientColor);
    areaGradient.addColorStop(1, 'rgba(15, 23, 42, 0)');
    ctx.fillStyle = areaGradient;
    ctx.fill();
  }

  // Draw Smooth Primary Line
  if (points.length > 0) {
    ctx.beginPath();
    ctx.moveTo(points[0].x, points[0].y);

    for (let i = 0; i < points.length - 1; i++) {
      const p0 = points[i];
      const p1 = points[i + 1];
      const cx = (p0.x + p1.x) / 2;
      ctx.bezierCurveTo(cx, p0.y, cx, p1.y, p1.x, p1.y);
    }

    ctx.strokeStyle = primaryColor;
    ctx.lineWidth = 3.5;
    ctx.shadowColor = primaryColor;
    ctx.shadowBlur = 12;
    ctx.stroke();
    ctx.shadowBlur = 0;
  }

  // Draw Glowing Data Dots
  points.forEach((pt, i) => {
    ctx.beginPath();
    ctx.arc(pt.x, pt.y, i === points.length - 1 ? 6 : 4, 0, Math.PI * 2);
    ctx.fillStyle = primaryColor;
    ctx.fill();
    ctx.lineWidth = 2;
    ctx.strokeStyle = '#ffffff';
    ctx.stroke();
  });
}

// Render 6 Spin Cards for Slot
function renderSlotPattern(amount, finalBalance, rounds = 6) {
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
    card.className = `spin-card-anim rounded-xl border p-2.5 transition-all duration-300 hover:scale-105 overflow-hidden ${delta >= 0 ? 'border-emerald-500/40 bg-emerald-950/80 shadow-lg shadow-emerald-950/50' : 'border-rose-500/40 bg-rose-950/80 shadow-lg shadow-rose-950/50'}`;
    card.style.animationDelay = `${i * 0.07}s`;

    card.innerHTML = `
      <div class="flex items-center justify-between gap-1 text-[10px] font-bold text-slate-300 mb-1 min-w-0">
        <span class="shrink-0">Spin ${i}</span>
        <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold shrink-0 ${delta >= 0 ? 'bg-emerald-500/30 text-emerald-300' : 'bg-rose-500/30 text-rose-300'}">${delta >= 0 ? 'MENANG' : 'KALAH'}</span>
      </div>
      <p class="text-xs font-bold leading-tight truncate ${delta >= 0 ? 'text-emerald-400' : 'text-rose-400'}">${delta >= 0 ? '+' : '−'}${rupiah.format(Math.abs(delta))}</p>
      <p class="mt-1 text-[10px] text-slate-400 font-medium truncate">Saldo: ${rupiah.format(nextBalance)}</p>
    `;
    pattern.appendChild(card);
    balance = nextBalance;
  }
}

// Render 6-Month Compounding Breakdown Cards for Deposito
function renderDepositBreakdown(amount, months, monthlyRate, rounds = 6) {
  const breakdown = document.getElementById('deposit-breakdown');
  if (!breakdown) return;
  breakdown.innerHTML = '';
  
  for (let i = 1; i <= rounds; i += 1) {
    const currentMonths = (months / rounds) * i;
    const currentBalance = Math.round(amount * Math.pow(1 + monthlyRate, currentMonths));
    const accumulatedInterest = currentBalance - amount;

    const card = document.createElement('div');
    card.className = `spin-card-anim rounded-xl border border-emerald-500/40 bg-emerald-950/80 p-2.5 transition-all duration-300 hover:scale-105 shadow-lg shadow-emerald-950/50 overflow-hidden`;
    card.style.animationDelay = `${i * 0.07}s`;

    card.innerHTML = `
      <div class="flex items-center justify-between gap-1 text-[10px] font-bold text-slate-300 mb-1 min-w-0">
        <span class="shrink-0">Periode ${i}</span>
        <span class="px-1.5 py-0.5 rounded text-[9px] font-extrabold bg-emerald-500/30 text-emerald-300 shrink-0">STABIL</span>
      </div>
      <p class="text-xs font-bold leading-tight text-emerald-400 truncate">+${rupiah.format(accumulatedInterest)}</p>
      <p class="mt-1 text-[10px] text-slate-400 font-medium truncate">Saldo: ${rupiah.format(currentBalance)}</p>
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

  // Always Render Spin & Breakdown Cards
  renderSlotPattern(amount, slotBalance, 6);
  renderDepositBreakdown(amount, months, monthlyRate, 6);

  // Generate Data for Canvas Graphs
  const labels = Array.from({length: 6}, (_, i) => {
    const m = Math.round((months / 5) * i);
    return m === 0 ? 'Awal' : `Bln ${m}`;
  });

  const depositValues = Array.from({length: 6}, (_, i) => 
    Math.round(amount * Math.pow(1 + monthlyRate, (months / 5) * i))
  );

  const slotValues = Array.from({length: 6}, (_, i) => {
    if (i === 0) return amount;
    if (i === 5) return slotBalance;
    const drop = amount - (amount - slotBalance) * (i / 5);
    const fluctuation = (Math.random() - 0.5) * amount * 0.08;
    return Math.max(0, Math.round(drop + fluctuation));
  });

  // Render High-DPI Native Canvas Charts
  drawNativeCanvasChart('slotChart', labels, slotValues, '#ef4444', 'rgba(239, 68, 68, 0.4)');
  drawNativeCanvasChart('depositoChart', labels, depositValues, '#10b981', 'rgba(16, 185, 129, 0.4)');

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

  window.addEventListener('resize', () => {
    simulate();
  });

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
