#include <bits/stdc++.h>

#define pb push_back
#define ll long long
#define ld long double

using namespace std;

struct point {
	int t, x, y;
	point() {}
	point(int t_, int x_, int y_) {
		t = t_;
		x = x_;
		y = y_;
	}
};

int n;
vector<vector<int>> a, b, c;
int t, x, y;

vector<point> all;

void read() {
	cin >> n;
	a.resize(n, vector<int>(n, 0));
	b.resize(n, vector<int>(n + 1, 0));
	c.resize(n + 1, vector<int>(n, 0));
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n; j++) {
			cin >> a[i][j];
		}
	}
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n + 1; j++) {
			cin >> b[i][j];
		}
	}
	for (int i = 0; i < n + 1; i++) {
		for (int j = 0; j < n; j++) {
			cin >> c[i][j];
		}
	}
}

void solve() {
	for (int i = 0; i < n; i++) {
		for (int j = 0; j < n + 1; j++) {
			if (b[i][j] == 0) {
				all.pb(point(1, i + 1, j + 1));
			}
		}
	}
	for (int i = 0; i < n + 1; i++) {
		for (int j = 0; j < n; j++) {
			if (c[i][j] == 0) {
				all.pb(point(2, i + 1, j + 1));
			}
		}
	}
}

void write() {
	random_device rd;
    mt19937 g(rd());
	shuffle(all.begin(), all.end(), g);
	
	int i = rand() % all.size();
	point tek = all[i];
	cout << tek.t << " " << tek.x << " " << tek.y << "\n";
}

signed main() {
	srand(time(NULL));
	ios::sync_with_stdio(0);
	cin.tie(0);
	cout.tie(0);
	freopen("map.txt", "rt", stdin);
	freopen("turn.txt", "wt", stdout);
	read();
	solve();
	write();
	
    return 0;
}

